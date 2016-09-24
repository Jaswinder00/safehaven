<?php

namespace DCGov\HavenBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DCGov\HavenBundle\Entity\Application;

/**
 * Application controller.
 *
 */
class ApplicationController extends Controller
{
    /**
     * Lists all Application entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $applications = $em->getRepository('DCGovHavenBundle:Application')->findAll();

        return $this->render('application/index.html.twig', array(
            'applications' => $applications,
        ));
    }

    /**
     * Finds and displays a Application entity.
     *
     */
    public function showAction(Application $application)
    {

        return $this->render('application/show.html.twig', array(
            'application' => $application,
        ));
    }
}
