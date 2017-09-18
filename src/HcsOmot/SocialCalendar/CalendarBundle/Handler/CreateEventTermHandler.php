<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Handler;

use AppBundle\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use HcsOmot\SocialCalendar\CalendarBundle\Command\CreateEventTermCommand;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\EventTerm;
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
        $eventId             = $createEventTermCommand->getEventId();
        $event               = $this->eventRepository->find($eventId);
        $term                = $createEventTermCommand->getTerm();
        $eventTermProposerId = $createEventTermCommand->getProposerId();
        $eventTermProposer   = $this->userRepository->find($eventTermProposerId);
        $eventTerm           = new EventTerm($eventTermId, $event, $term, $eventTermProposer);

        $this->entityManager->persist($eventTerm);
        $this->entityManager->flush();
    }
}
