<?php
namespace DCGov\HavenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommonController extends Controller {
	
	public function __construct($container) {
		$this->setContainer($container);
	}
	
	/**
	 * Call this method to remove Entity
	 * @param string  $entity_name - full Entity name
	 * @param integer $cotentant_id
	 */
	public function removeEntity($id, $entity_name) {
	
		$em = $this->getDoctrine()->getManager();
		$entity = $em->getRepository($entity_name)->find($id);
	
		if (!$entity) {
			throw $this->createNotFoundException("Unable to find $entity entity.");
		}
		 
		$em->remove($entity);
		$em->flush();
		 
	}
	
}