<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Handler;

use Doctrine\ORM\EntityManager;
use HcsOmot\SocialCalendar\CalendarBundle\Command\EditEventCommand;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\Event;

class EditEventHandler
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
     * @param \HcsOmot\SocialCalendar\CalendarBundle\Command\EditEventCommand $editEventCommand
     */
    public function handle(EditEventCommand $editEventCommand)
    {
        $event = new Event();

        $event->setId($editEventCommand->getId());
        $event->setName($editEventCommand->getName());
        $event->setDescription($editEventCommand->getDescription());
        $event->setVenue($editEventCommand->getVenue());
        $event->setOwner($editEventCommand->getOwner());

        $this->entityManager->persist($event);
        $this->entityManager->flush();
    }
}
