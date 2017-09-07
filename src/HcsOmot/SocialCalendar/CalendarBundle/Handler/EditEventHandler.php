<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Handler;

use Doctrine\ORM\EntityManager;
use HcsOmot\SocialCalendar\CalendarBundle\Command\EditEventCommand;
use HcsOmot\SocialCalendar\CalendarBundle\Repository\EventRepository;

class EditEventHandler
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;
    /**
     * @var \HcsOmot\SocialCalendar\CalendarBundle\Repository\EventRepository
     */
    private $eventRepository;

    public function __construct(EntityManager $entityManager, EventRepository $eventRepository)
    {
        $this->entityManager   = $entityManager;
        $this->eventRepository = $eventRepository;
    }

    /**
     * @param \HcsOmot\SocialCalendar\CalendarBundle\Command\EditEventCommand $editEventCommand
     */
    public function handle(EditEventCommand $editEventCommand)
    {
        $event = $this->eventRepository->find($editEventCommand->getId());

        if (null === $event) {
            throw new \Exception();
        }
        $event->setDescription($editEventCommand->getDescription());
        $event->setVenue($editEventCommand->getVenue());

        $this->entityManager->persist($event);
        $this->entityManager->flush();
    }
}
