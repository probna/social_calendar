<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Handler;

use Doctrine\ORM\EntityManager;
use HcsOmot\SocialCalendar\CalendarBundle\Command\EditEventCommand;

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
        $eventRepository = $this->entityManager->getRepository('HcsOmot\SocialCalendar\CalendarBundle\Entity\Event');

        $event = $eventRepository->findOneBy(['id' => $editEventCommand->getId()]);

        $event->setName($editEventCommand->getName());
        $event->setDescription($editEventCommand->getDescription());
        $event->setVenue($editEventCommand->getVenue());
        $event->setOwner($editEventCommand->getOwner());

        $this->entityManager->persist($event);
        $this->entityManager->flush();
    }
}
