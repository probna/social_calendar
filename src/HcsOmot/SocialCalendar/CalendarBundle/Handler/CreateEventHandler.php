<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Handler;

use AppBundle\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use HcsOmot\SocialCalendar\CalendarBundle\Command\CreateEventCommand;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\Event;

class CreateEventHandler {
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;
    /**
     * @var \AppBundle\Repository\UserRepository
     */
    private $userRepository;

    /**
     * CreateEventHandler constructor.
     *
     * @param \Doctrine\ORM\EntityManager $entityManager
     * @param \AppBundle\Repository\UserRepository $userRepository
     */
    public function __construct(EntityManager $entityManager, UserRepository $userRepository)
    {
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
    }

    /**
     * @param \HcsOmot\SocialCalendar\CalendarBundle\Command\CreateEventCommand $createEventCommand
     */
    public function handle(CreateEventCommand $createEventCommand)
    {
        $eventId = $createEventCommand->getId();
        $eventName = $createEventCommand->getName();
        $eventDescription = $createEventCommand->getDescription();
        $eventVenue = $createEventCommand->getVenue();
        $eventOwnerID = $createEventCommand->getOwnerID();

        $eventOwner = $this->userRepository->find($eventOwnerID);

        $event = new Event($eventId, $eventName, $eventDescription, $eventVenue, $eventOwner);

        $this->entityManager->persist($event);
        $this->entityManager->flush();
    }
}
