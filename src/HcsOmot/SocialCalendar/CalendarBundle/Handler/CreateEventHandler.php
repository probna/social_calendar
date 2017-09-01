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

    public function handle(CreateEventCommand $createEventCommand)
    {
      $event = new Event();

      $event->setId($createEventCommand->getId());
      $event->setName($createEventCommand->getName());
      $event->setDescription($createEventCommand->getDescription());
      $event->setVenue($createEventCommand->getVenue());
      $event->setOwner($createEventCommand->getOwner());

        $this->entityManager->persist($event);
        $this->entityManager->flush();
    }
}
