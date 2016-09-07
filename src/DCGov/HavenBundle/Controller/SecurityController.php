<?php

namespace DCGov\HavenBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use DCGov\HavenBundle\Utility\Common;

class SecurityController extends Controller
{
	/**
	 * @Route("/admin/login", name="login_route")
	 */
	public function loginAction(Request $request)
	{
		$authenticationUtils = $this->get('security.authentication_utils');

		// get the login error if there is one
		$error = $authenticationUtils->getLastAuthenticationError();

		// last username entered by the user
		$lastUsername = $authenticationUtils->getLastUsername();

		return $this->render(
				'DCGovHavenBundle:Security:index.html.twig',
				array(
						// last username entered by the user
						'last_username' => $lastUsername,
						'error'         => $error,
				)
				);
	}

	/**
	 * @Route("/login_check", name="login_check")
	 */
	public function loginCheckAction()
	{
		throw new \Exception('This should never be reached!');
	}
	
	/**
	 * Call this controller to show the password reset page
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function passwordResetAction(Request $request) {
		return $this->render('DCGovHavenBundle:Security:password-reset.html.twig',array('error' => ''));
	}
	
	/**
	 * Call this controller to process password reset action
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function passwordSubmitAction(Request $request) {
		$username = $request->request->get("_username");
		//Check if the user exist in the the database
		$customUser = new CustomUserController($this->container);
		$user = $customUser->findUser(array('username' => $username));
		if(null == $user) {
			return $this->render('DCGovHavenBundle:Security:password-reset.html.twig',
					array('error' => 'The username that you have entered does not exist. Please re-enter the username.'));
		}
		
		//Send a password reset email to the user
		$mailer = $this->get('app.email');
		$subject = "Pasword Reset Email";
		
		$bodyTemplate = "DCGovHavenBundle:Emails:password-reset.html.twig";
		
		//Read Username and UserID to encrypt
		$plaintext = $user->getId()."|".$user->getUsername();
		$encryptedText = Common::encrypt($plaintext);
		
		$reset_link = $this->generateUrl('password_reset_link',
				array('code' => $encryptedText));
		
		$bodyTemplate = $this->renderView($bodyTemplate,
						array('name' => $user->getFirstname(),
							  'reset_link' => $reset_link
						));
		$mailer->send($user->getEmail(),$subject,$bodyTemplate);
		
		
		return $this->render('DCGovHavenBundle:Security:password-success.html.twig');
	}
	
	public function passwordResetLinkAction(Request $request) {

		$reset_code = $request->query->get("code");

		//Decrypt the reset code
		$plaintext = Common::decrypt($reset_code);
		
		$logger = $this->get('logger');
		$logger->info('Decrypted text: '.$plaintext);
		
		//Split the plain text by '|'
		$reset_array = explode("|", $plaintext);
		
		$userid = intval($reset_array[0]);
		
		if(!empty($reset_array)) {

			//Read User ID and username and cross check the username
			$customUser = new CustomUserController($this->container);
			$user = $customUser->findUser(array('id' => $userid));
			
			//Check if the user instance is returned and the user id matches with the reset code
			if(null != $user and $user->getUsername() == $reset_array[1]) {
				return $this->render('DCGovHavenBundle:Security:password-change.html.twig',
						array('userid' => $user->getID())
						);
			}
		
		}
		
		//Send the user back to password reset page
		return $this->redirectToRoute('password_reset');

	}
	
	/**
	 * Call this controller action to change the user password
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function passwordChangeSubmitAction(Request $request) {
		$userid = $request->request->get("userid");
		$newpassword = $request->request->get("password");
		
		//Read User ID and username and cross check the username
		$customUser = new CustomUserController($this->container);
		
		//Change User Password
		$customUser->updatePassword($userid, $newpassword);
		return $this->render('DCGovHavenBundle:Security:password-success.html.twig', array('ispasswordchanged'=>true));
	}
	
}