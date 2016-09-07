<?php

namespace DCGov\HavenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use DCGov\HavenBundle\Utility\Common;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
    	if(!Common::isUserAuthenticated($this)) {
    		// redirect to the "Login" route
    		return $this->redirectToRoute('login');
    	}
        
    	return $this->render('DCGovHavenBundle:Default:index.html.twig');
    }
}
