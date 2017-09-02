<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Handler;

use Doctrine\ORM\EntityManager;
use HcsOmot\SocialCalendar\CalendarBundle\Command\CreateEventCommand;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\Event;

class CreateEventHandler
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param \HcsOmot\SocialCalendar\CalendarBundle\Command\CreateEventCommand $createEventCommand
     */
    public function handle(CreateEventCommand $createEventCommand)
    {
        $eventId          = $createEventCommand->getId();
        $eventName        =$createEventCommand->getName();
        $eventDescription = $createEventCommand->getDescription();
        $eventVenue       = $createEventCommand->getVenue();
        $eventOwner       = $createEventCommand->getOwner();

        $event = new Event($eventId, $eventName, $eventDescription, $eventVenue, $eventOwner);

        $this->entityManager->persist($event);
        $this->entityManager->flush();
    }
}
