<?php

namespace DCGov\HavenBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DCGov\HavenBundle\Entity\PersonIncome;

/**
 * PersonIncome controller.
 *
 */
class PersonIncomeController extends Controller
{
    /**
     * Lists all PersonIncome entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $personIncomes = $em->getRepository('DCGovHavenBundle:PersonIncome')->findAll();

        return $this->render('personincome/index.html.twig', array(
            'personIncomes' => $personIncomes,
        ));
    }

    /**
     * Finds and displays a PersonIncome entity.
     *
     */
    public function showAction(PersonIncome $personIncome)
    {

        return $this->render('personincome/show.html.twig', array(
            'personIncome' => $personIncome,
        ));
    }
}
