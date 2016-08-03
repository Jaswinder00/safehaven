<?php
namespace DCGov\HavenBundle\Store;

use DCGov\HavenBundle\Entity\IdEntry;
use Doctrine\Common\Persistence\ObjectManager;
use LightSaml\Provider\TimeProvider\TimeProviderInterface;
use LightSaml\Store\Id\IdStoreInterface;

class IdStore implements IdStoreInterface
{
    /** @var ObjectManager */
    private $manager;

    /** @var  TimeProviderInterface */
    private $timeProvider;

    /**
     * @param ObjectManager         $manager
     * @param TimeProviderInterface $timeProvider
     */
    public function __construct(ObjectManager $manager, TimeProviderInterface $timeProvider)
    {
        $this->manager = $manager;
        $this->timeProvider = $timeProvider;
    }

    /**
     * @param string    $entityId
     * @param string    $assertionId
     * @param \DateTime $expiryTime
     *
     * @return void
     */
    public function set($entityId, $assertionId, \DateTime $expiryTime)
    {
		$idEntry = $this->manager->getRepository('DCGovHavenBundle:IdEntry')->findBy(['entityId'=>$entityId, 'assertionId'=>$assertionId]);
        if (null == $idEntry) {
            $idEntry = new IdEntry();
        }
        $idEntry->setEntityId($entityId)
            ->setAssertionId($assertionId)
            ->setExpiryTime($expiryTime);
        $this->manager->persist($idEntry);
        $this->manager->flush($idEntry);
    }

    /**
     * @param string $entityId
     * @param string $assertionId
     *
     * @return bool
     */
    public function has($entityId, $assertionId)
    {
        
    	$idEntry =  $this->manager->getRepository('DCGovHavenBundle:IdEntry')->findBy(array('entityId' => $entityId, 'assertionId' => $assertionId));
        if (null == $idEntry) {
            return false;
        }
        if ($idEntry->getExpiryTime()->getTimestamp() < $this->timeProvider->getTimestamp()) {
            return false;
        }

        return true;
    }
}
