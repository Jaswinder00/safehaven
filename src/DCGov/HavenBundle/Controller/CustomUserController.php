<?php
namespace DCGov\HavenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use DCGov\HavenBundle\Utility\Common;
use DCGov\HavenBundle\Entity\User;
use DCGov\HavenBundle\Entity\Role;

class CustomUserController extends UserController
{

	const PASSWORD_MASK = "***********";
	
	public function __construct($container) {
		$this->setContainer($container);
	}
	
	/**
	 * Call this function to get Users in a json format
	 * @param Request $request
	 * @return string $json
	 */
	public function getUsersAsJsonString() {
	
		$em = $this->getDoctrine()->getManager();
	
		$entities = $em->getRepository('GapToolsBundle:User')->findAll();
	
		$json = '{"draw": 1,
         "recordsTotal":'.count($entities).',
         "recordsFiltered":10,
         "data":[';
			
		foreach ($entities as $entity) {
	
			$json .= '{ "DT_RowId":"'.Common::ID_PREFIX . $entity->getId() .
			'","email":"'.$entity->getEmail().
			'","firstname":"'.$entity->getFirstname().
			'","lastname":"'.$entity->getLastname().
			'","password":"'. self::PASSWORD_MASK .
			'","role":"'.$entity->getRole()->getName().
			'","isactive":"'.$entity->getIsactive() . '" },';
		}
			
		$json = rtrim($json, ",");
		$json .= '], "options": [], "files": [] }';
			
			
		return $json;
	}
	
	/**
	 * Call this method to save User: Add/Update/Delete
	 * @param Request $request
	 * @throws NotFoundHttpException
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function saveUser($post_action, $post_data) {
	
	
		$json ="{}";
	
		foreach ($post_data as $id => $values) {
			$userid = str_replace( Common::ID_PREFIX, '', $id );
		}
	
		if("edit" == $post_action) {	//Update
			$json = $this->updateUser($post_data, $userid);
	
		} elseif ("remove" == $post_action) {	//Remove
			$common = new CommonController($this->container);
			$common->removeEntity($userid, 'GapToolsBundle:User');
			$json = '{ "data": [] }';
	
		} elseif ("create" == $post_action) {	//New
			$json = $this->createUser($post_data);
		} else {
			throw new NotFoundHttpException("Page not found");
		}
			
		return $json;
	}
	
	/**
	 * Call this method to create new User
	 * @param unknown $post_data
	 */
	private function createUser($post_data) {
		$em = $this->getDoctrine()->getManager();
		$user = new User();
		$userid = 0;
	
		$user->setEmail($post_data[$userid]["email"]);
		$user->setFirstname($post_data[$userid]["firstname"]);
		$user->setLastname($post_data[$userid]["lastname"]);
	
		$user->setPassword ( $this->encryptPassword($post_data[$userid]["password"]) );
	
		$role = $this->getUserRoleInstance($post_data[$userid]["role"]);
	
		$user->setRole ( $role );
	
		$user->setIsactive( (int) $post_data[$userid]["isactive"]);
	
		$user->setCreatedBy ( Common::getLoggedInUsername ( $this ) );
		$user->setCreatedTimestamp ( new \DateTime ( "now" ) );
	
		$em->persist($user);
		$em->flush();
	
		return $this->createJSon($user);
	}
	
	
	
	/**
	 * Call this method to Update User Data
	 * @param array $post_data
	 * @param integer $userid
	 */
	private function updateUser($post_data,$userid) {
	
		$em = $this->getDoctrine()->getManager();
		$user = $em->getRepository('GapToolsBundle:User')->find($userid);
	
		if (!$user) {
			throw $this->createNotFoundException('Unable to find Report entity.');
		}
	
	
		if(isset($post_data[Common::ID_PREFIX.$userid]["email"]))
			$user->setEmail($post_data[Common::ID_PREFIX.$userid]["email"]);
	
			if(isset($post_data[Common::ID_PREFIX.$userid]["firstname"]))
				$user->setFirstname($post_data[Common::ID_PREFIX.$userid]["firstname"]);
	
				if(isset($post_data[Common::ID_PREFIX.$userid]["lastname"]))
					$user->setLastname($post_data[Common::ID_PREFIX.$userid]["lastname"]);
						
					// Set Password
					if (isset ( $post_data [Common::ID_PREFIX . $userid] ["password"] )) {
						$plainPassword = $post_data [Common::ID_PREFIX . $userid] ["password"];
							
						if(self::PASSWORD_MASK !== $plainPassword) {
							$user->setPassword( $this->encryptPassword($plainPassword) );
						}
					}
	
					// Set Role
					if (isset ( $post_data [Common::ID_PREFIX . $userid] ["role"] )) {
						$role_name = $post_data [Common::ID_PREFIX . $userid] ["role"];
						$role = $this->getUserRoleInstance($role_name);
						$user->setRole( $role );
					}
	
					if (isset ( $post_data [Common::ID_PREFIX . $userid] ["isactive"] ))
						$user->setIsactive( ( int ) $post_data [Common::ID_PREFIX . $userid] ["isactive"] );
	
						$user->setModifiedBy( Common::getLoggedInUsername ( $this ) );
						$user->setModifiedTimestamp( new \DateTime ( "now" ) );
	
						$em->persist( $user );
						$em->flush();
	
						return $this->createJSon($user);
	
	}
	
	/**
	 * Call this method to encrypt User password
	 * @param string $password
	 * @return string $encrypted password
	 */
	private function encryptPassword($plainPassword) {
		$factory = $this->get ( 'security.encoder_factory' );
		$user = new User();
		$encoder = $factory->getEncoder ( $user );
	
		return $encoder->encodePassword ( $plainPassword, $user->getSalt () );
	}
	
	/**
	 * Call this method to the the User Rol based on the Name provided
	 * @param string $role_name
	 * @return Role
	 */
	private function getUserRoleInstance($role_name) {
		$em = $this->getDoctrine()->getManager();
		$role = $em->getRepository ( 'GapToolsBundle:Role' )->findByName ( $role_name )[0];
		if ($role) {
			return $role;
		}
	
		//Default
		return $em->getRepository ( 'GapToolsBundle:Role' )->findByName ( "ROLE_USER" )[0];
	}
	
	/**
	 * Call this function to JSon string from user class
	 * @param User $user
	 * @return string
	 */
	private function createJSon($user) {
	
		$json = '{ "data": [ '.
				'{ "DT_RowId":"'.Common::ID_PREFIX . $user->getId() .
				'","email":"'.$user->getEmail().
				'","firstname":"'.$user->getFirstname().
				'","lastname":"'.$user->getLastname().
				'","password":"'. self::PASSWORD_MASK .
				'","role":"'.$user->getRole()->getName().
				'","isactive":"'.$user->getIsactive() .
				'" } ] , "options": [], "files": [] }';
	
		return $json;
	}
}