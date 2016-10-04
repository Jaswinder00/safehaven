<?php

namespace DCGov\HavenBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DCGov\HavenBundle\Entity\ApplicationPerson;

/**
 * ApplicationPerson controller.
 *
 */
class ApplicationPersonController extends Controller
{
    /**
     * Lists all ApplicationPerson entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $applicationPeople = $em->getRepository('DCGovHavenBundle:ApplicationPerson')->findAll();

        return $this->render('applicationperson/index.html.twig', array(
            'applicationPeople' => $applicationPeople,
        ));
    }

    /**
     * Finds and displays a ApplicationPerson entity.
     *
     */
    public function showAction(ApplicationPerson $applicationPerson)
    {

        return $this->render('applicationperson/show.html.twig', array(
            'applicationPerson' => $applicationPerson,
        ));
    }
}
