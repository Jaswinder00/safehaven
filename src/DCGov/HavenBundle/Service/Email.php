<?php

namespace DCGov\HavenBundle\Service;

class Email {
	
	CONST FROM_EMAIL = 'no-reply@dc.gov';
	
	protected $container;
	
	public function __construct($container = null){
	    $this->container = $container;
	}
	
	/**
	 * Call this method to send an email
	 * @param string $toEmail
	 * @param string $subject
	 * @param string $body
	 */
	public function send($toEmail,$subject,$body) {
		//Send an email to the user to reset the password
		$message = \Swift_Message::newInstance()
		->setSubject($subject)
		->setFrom(self::FROM_EMAIL)
		->setTo($toEmail)
		->setBody(
				$body,
				'text/html'
				);
		$this->container->get('mailer')->send($message);
	}
}