<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Handler;

use Doctrine\ORM\EntityManager;
use HcsOmot\SocialCalendar\CalendarBundle\Command\CreateEventTermCommand;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\EventTerm;

class CreateEventTermHandler
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(CreateEventTermCommand $createEventTermCommand)
    {
        $eventTermId       = $createEventTermCommand->getId();
        $event             = $createEventTermCommand->getEvent();
        $term              = $createEventTermCommand->getTerm();
        $eventTermProposer = $createEventTermCommand->getProposer();

        $eventTerm         = new EventTerm($eventTermId, $event, $term, $eventTermProposer);

        $this->entityManager->persist($eventTerm);
        $this->entityManager->flush();
    }
}
