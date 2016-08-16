<?php

namespace DCGov\HavenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DCGov\HavenBundle\Utility\Common;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	if(!Common::isUserAuthenticated($this)) {	
    		return $this->render('DCGovHavenBundle:Default:unauthorized.html.twig');
    	}
        
    	return $this->render('DCGovHavenBundle:Default:index.html.twig');
    }
}
