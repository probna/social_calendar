<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Handler;

use AppBundle\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use HcsOmot\SocialCalendar\CalendarBundle\Command\CreateEventTermCommand;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\Event;
use HcsOmot\SocialCalendar\CalendarBundle\Repository\EventRepository;

class CreateEventTermHandler
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;
    /**
     * @var \HcsOmot\SocialCalendar\CalendarBundle\Repository\EventRepository
     */
    private $eventRepository;
    /**
     * @var \AppBundle\Repository\UserRepository
     */
    private $userRepository;

    public function __construct(
        EntityManager $entityManager,
        EventRepository $eventRepository,
        UserRepository $userRepository
    ) {
        $this->entityManager   = $entityManager;
        $this->eventRepository = $eventRepository;
        $this->userRepository  = $userRepository;
    }

    public function handle(CreateEventTermCommand $createEventTermCommand)
    {
        $eventTermId         = $createEventTermCommand->getId();
        $term                = $createEventTermCommand->getTerm();
        $eventTermProposer   = $this->userRepository->find($createEventTermCommand->getProposerId());

        $event = $this->loadEvent($createEventTermCommand->getEventId());

        $event->addTerm($eventTermId, $term, $eventTermProposer);
        $this->entityManager->persist($event);
        $this->entityManager->flush();
    }

    private function loadEvent(int $eventId): Event
    {
        return $this->eventRepository->find($eventId);
    }
}
