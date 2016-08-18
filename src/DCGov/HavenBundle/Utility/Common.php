<?php

namespace DCGov\HavenBundle\Utility;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Common {
	
	const ID_PREFIX = 'row_';
	
	/**
	 * Call this method to get current date and time in mm/dd/yyyy H:i:s format
	 * @return date
	 */
	public static function getCurrentTimestamp($format='m/d/Y H:i:s') {
		return date($format);
	}
	
	/**
	 * Call this method to convert date yyyy-mm-dd to mm-dd-yyyy format
	 * @param string $format_literal -  /, -, or .
	 * @param string $date
	 * @return string $date
	 */
	public static function convertDate($date, $format_literal="/") {
		if(null == $date) return "";
		return date("m".$format_literal."d".$format_literal."Y", strtotime($date));
	}
	
	/**
	 * Call this method to convert Datatime value to formatted string ('m/d/Y H:i:s' - default ).
	 * @param DataTime $datetime
	 * @return string date
	 */
	public static function convertDateTimeToString($datetime, $format = 'm/d/Y H:i:s') {
		if(null == $datetime) return "";
		
		return $datetime->format($format);
	}
	
	/*
	 * Call this method to get Logged In User Object
	 */
	public static function getLoggedInUser($class_ref) {
		if (!$class_ref->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
			throw $class_ref->createAccessDeniedException();
		}
		return $class_ref->get('security.token_storage')->getToken()->getUser();
	}
	
	
	/**
	 * Returns First and last name of logged in user
	 */
	public static function getLoggedInUsername($class_ref) {
		$user = Common::getLoggedInUser($class_ref);
		return $user->getFirstname()." ". $user->getLastname();
	}
	
	//Call this function to ensure the user is fully authenticated 
	public static function isUserAuthenticated($class_ref) {
		return $class_ref->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY');
	}
	
	/**
	 * Call this method valid incoming request
	 * @param Request $request
	 * @param string $method
	 * @throws NotFoundHttpException
	 */
	public static function checkRequest(Request $request, $method = "POST" ) {
		if ($method !== $request->getMethod() || !$request->isXmlHttpRequest()) {
			throw new NotFoundHttpException("Page not found");
		}
	}
	
	/**
	 * Call this method to generate JSON formatted message to return in a response
	 * @param string $status
	 * @param int $entityid
	 * @param string $error_message
	 * @param array $arrOtherValues
	 */
	public static function createJsonReturnMessage($status, $entityid=0,$error_message = "",$arrOtherValues=[]) {
		$return_values = array('status' => $status,
				'id' => $entityid,
				'error'	=> $error_message
				);

		foreach ($arrOtherValues as $key => $value) {
			$return_values[$key] = $value;
		}
			
		$json_value = json_encode($return_values);
		
		return $json_value;
	}

	/**
	 * Call this method to generate a form Token
	 * @param string $entityName
	 * @return CsrfToken
	 */
	public static function createToken($class_ref, $entityName) {
		$csrf = $class_ref->get('security.csrf.token_manager');
		return $csrf->refreshToken($entityName);
	}
	
}