<?php

namespace DCGov\HavenBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DCGov\HavenBundle\Entity\Report;

/**
 * Report controller.
 *
 */
class ReportController extends Controller
{
    /**
     * Lists all Report entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reports = $em->getRepository('DCGovHavenBundle:Report')->findAll();

        return $this->render('report/index.html.twig', array(
            'reports' => $reports,
        ));
    }

    /**
     * Finds and displays a Report entity.
     *
     */
    public function showAction(Report $report)
    {

        return $this->render('report/show.html.twig', array(
            'report' => $report,
        ));
    }
}
