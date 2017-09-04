<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Command;

use AppBundle\Entity\User;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\Event;

class CreateEventTermCommand
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var \HcsOmot\SocialCalendar\CalendarBundle\Entity\Event
     */
    private $event;
    /**
     * @var \DateTime
     */
    private $term;
    /**
     * @var \AppBundle\Entity\User
     */
    private $proposer;

    public function __construct(int $id, Event $event, \DateTime $term, User $proposer)
    {
        $this->id       = $id;
        $this->event    = $event;
        $this->term     = $term;
        $this->proposer = $proposer;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return \HcsOmot\SocialCalendar\CalendarBundle\Entity\Event
     */
    public function getEvent(): \HcsOmot\SocialCalendar\CalendarBundle\Entity\Event
    {
        return $this->event;
    }

    /**
     * @return \DateTime
     */
    public function getTerm(): \DateTime
    {
        return $this->term;
    }

    /**
     * @return \AppBundle\Entity\User
     */
    public function getProposer(): \AppBundle\Entity\User
    {
        return $this->proposer;
    }
}
