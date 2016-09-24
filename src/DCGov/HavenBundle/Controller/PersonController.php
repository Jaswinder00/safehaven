<?php

namespace DCGov\HavenBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DCGov\HavenBundle\Entity\Person;

/**
 * Person controller.
 *
 */
class PersonController extends Controller
{
    /**
     * Lists all Person entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $people = $em->getRepository('DCGovHavenBundle:Person')->findAll();

        return $this->render('person/index.html.twig', array(
            'people' => $people,
        ));
    }

    /**
     * Finds and displays a Person entity.
     *
     */
    public function showAction(Person $person)
    {

        return $this->render('person/show.html.twig', array(
            'person' => $person,
        ));
    }
}
