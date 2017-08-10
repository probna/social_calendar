<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Controller;

use HcsOmot\SocialCalendar\CalendarBundle\Entity\EventTerm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Eventterm controller.
 *
 * @Route("eventterm")
 */
class EventTermController extends Controller
{
    /**
     * Lists all eventTerm entities.
     *
     * @Route("/", name="eventterm_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $eventTerms = $em->getRepository('HcsOmotSocialCalendarCalendarBundle:EventTerm')->findAll();

        return $this->render('eventterm/index.html.twig', array(
            'eventTerms' => $eventTerms,
        ));
    }

    /**
     * Creates a new eventTerm entity.
     *
     * @Route("/new", name="eventterm_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $eventTerm = new Eventterm();
        $form = $this->createForm('HcsOmot\SocialCalendar\CalendarBundle\Form\EventTermType', $eventTerm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($eventTerm);
            $em->flush();

            return $this->redirectToRoute('eventterm_show', array('id' => $eventTerm->getId()));
        }

        return $this->render('eventterm/new.html.twig', array(
            'eventTerm' => $eventTerm,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a eventTerm entity.
     *
     * @Route("/{id}", name="eventterm_show")
     * @Method("GET")
     */
    public function showAction(EventTerm $eventTerm)
    {
        $deleteForm = $this->createDeleteForm($eventTerm);

        return $this->render('eventterm/show.html.twig', array(
            'eventTerm' => $eventTerm,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing eventTerm entity.
     *
     * @Route("/{id}/edit", name="eventterm_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EventTerm $eventTerm)
    {
        $deleteForm = $this->createDeleteForm($eventTerm);
        $editForm = $this->createForm('HcsOmot\SocialCalendar\CalendarBundle\Form\EventTermType', $eventTerm);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('eventterm_edit', array('id' => $eventTerm->getId()));
        }

        return $this->render('eventterm/edit.html.twig', array(
            'eventTerm' => $eventTerm,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a eventTerm entity.
     *
     * @Route("/{id}", name="eventterm_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EventTerm $eventTerm)
    {
        $form = $this->createDeleteForm($eventTerm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($eventTerm);
            $em->flush();
        }

        return $this->redirectToRoute('eventterm_index');
    }

    /**
     * Creates a form to delete a eventTerm entity.
     *
     * @param EventTerm $eventTerm The eventTerm entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EventTerm $eventTerm)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('eventterm_delete', array('id' => $eventTerm->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Performs a +1 vote for event term.
     *
     * @Route("/{id}/vote", name="eventterm_vote")
     * @Method({"GET", "POST"})
     */
    public function voteForTerm(Request $request, EventTerm $eventTerm)
    {
        $eventTerm->voteForTerm();

        $em = $this->getDoctrine()->getManager();

        $em->persist($eventTerm);
        $em->flush();

        return $this->redirectToRoute('eventterm_index');

    }
}
