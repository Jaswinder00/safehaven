<?php

namespace DCGov\HavenBundle\Entity;

/**
 * IdEntry
 */
class IdEntry
{
    /**
     * @var string
     */
    private $assertionId;

    /**
     * @var string
     */
    private $entityId;

    /**
     * @var \DateTime
     */
    private $expiryTime;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set assertionId
     *
     * @param string $assertionId
     *
     * @return IdEntry
     */
    public function setAssertionId($assertionId)
    {
        $this->assertionId = $assertionId;

        return $this;
    }

    /**
     * Get assertionId
     *
     * @return string
     */
    public function getAssertionId()
    {
        return $this->assertionId;
    }

    /**
     * Set entityId
     *
     * @param string $entityId
     *
     * @return IdEntry
     */
    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;

        return $this;
    }

    /**
     * Get entityId
     *
     * @return string
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

    /**
     * Set expiryTime
     *
     * @param \DateTime $expiryTime
     *
     * @return IdEntry
     */
    public function setExpiryTime($expiryTime)
    {
        $this->expiryTime = $expiryTime;

        return $this;
    }

    /**
     * Get expiryTime
     *
     * @return \DateTime
     */
    public function getExpiryTime()
    {
        return $this->expiryTime;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

