<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Controller;

use HcsOmot\SocialCalendar\CalendarBundle\Command\CreateEventCommand;
use HcsOmot\SocialCalendar\CalendarBundle\Command\EditEventCommand;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Event controller.
 *
 * @Route("event")
 */
class EventController extends Controller
{
    /**
     * Lists all event entities.
     *
     * @Route("/", name="event_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('HcsOmotSocialCalendarCalendarBundle:Event')->findAll();

        return $this->render('event/index.html.twig', [
            'events' => $events,
        ]);
    }

    /**
     * Creates a new event entity.
     *
     * @Route("/new", name="event_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $form  = $this->createForm('HcsOmot\SocialCalendar\CalendarBundle\Form\EventType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commandBus = $this->get('tactician.commandbus');

            $eventId          = time();
            $eventName        = $form->getData()['name'];
            $eventDescription = $form->getData()['description'];
            $eventVenue       = $form->getData()['venue'];
            $eventOwner       = $this->getUser();

            $createNewEventCommand = new CreateEventCommand($eventId, $eventName, $eventDescription, $eventVenue, $eventOwner);

            $commandBus->handle($createNewEventCommand);

            return $this->redirectToRoute('event_show', ['id' => $eventId]);
        }

        return $this->render('event/new.html.twig', [
            'form'  => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a event entity.
     *
     * @Route("/{id}", name="event_show")
     * @Method("GET")
     */
    public function showAction(Event $event)
    {
        $deleteForm = $this->createDeleteForm($event);

        return $this->render('event/show.html.twig', [
            'event'       => $event,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing event entity.
     *
     * @Route("/{id}/edit", name="event_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Event $event)
    {
        $deleteForm = $this->createDeleteForm($event);

        $editForm   = $this->createForm('HcsOmot\SocialCalendar\CalendarBundle\Form\EventType', $event);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $eventId          = $event->getId();
            $eventName        = $editForm['name']->getData();
            $eventDescription = $editForm['description']->getData();
            $eventVenue       = $editForm['venue']->getData();
            $eventOwner       = $this->getUser();

            $editEventCommand = new EditEventCommand($eventId, $eventName, $eventDescription, $eventVenue, $eventOwner);

            $commandBus = $this->get('tactician.commandbus');

            $commandBus->handle($editEventCommand);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('event_edit', ['id' => $event->getId()]);
        }

        return $this->render('event/edit.html.twig', [
            'event'       => $event,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Deletes a event entity.
     *
     * @Route("/{id}", name="event_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Event $event)
    {
        $form = $this->createDeleteForm($event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($event);
            $em->flush();
        }

        return $this->redirectToRoute('event_index');
    }

    /**
     * Creates a form to delete a event entity.
     *
     * @param Event $event The event entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Event $event)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('event_delete', ['id' => $event->getId()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
