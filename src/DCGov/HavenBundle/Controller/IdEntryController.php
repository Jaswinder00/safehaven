<?php

namespace DCGov\HavenBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DCGov\HavenBundle\Entity\IdEntry;
use DCGov\HavenBundle\Form\IdEntryType;

/**
 * IdEntry controller.
 *
 */
class IdEntryController extends Controller
{
    /**
     * Lists all IdEntry entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $idEntries = $em->getRepository('DCGovHavenBundle:IdEntry')->findAll();

        return $this->render('identry/index.html.twig', array(
            'idEntries' => $idEntries,
        ));
    }

    /**
     * Creates a new IdEntry entity.
     *
     */
    public function newAction(Request $request)
    {
        $idEntry = new IdEntry();
        $form = $this->createForm('DCGov\HavenBundle\Form\IdEntryType', $idEntry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($idEntry);
            $em->flush();

            return $this->redirectToRoute('identry_show', array('id' => $idEntry->getId()));
        }

        return $this->render('identry/new.html.twig', array(
            'idEntry' => $idEntry,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a IdEntry entity.
     *
     */
    public function showAction(IdEntry $idEntry)
    {
        $deleteForm = $this->createDeleteForm($idEntry);

        return $this->render('identry/show.html.twig', array(
            'idEntry' => $idEntry,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing IdEntry entity.
     *
     */
    public function editAction(Request $request, IdEntry $idEntry)
    {
        $deleteForm = $this->createDeleteForm($idEntry);
        $editForm = $this->createForm('DCGov\HavenBundle\Form\IdEntryType', $idEntry);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($idEntry);
            $em->flush();

            return $this->redirectToRoute('identry_edit', array('id' => $idEntry->getId()));
        }

        return $this->render('identry/edit.html.twig', array(
            'idEntry' => $idEntry,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a IdEntry entity.
     *
     */
    public function deleteAction(Request $request, IdEntry $idEntry)
    {
        $form = $this->createDeleteForm($idEntry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($idEntry);
            $em->flush();
        }

        return $this->redirectToRoute('identry_index');
    }

    /**
     * Creates a form to delete a IdEntry entity.
     *
     * @param IdEntry $idEntry The IdEntry entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(IdEntry $idEntry)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('identry_delete', array('id' => $idEntry->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
