<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Command;

class CreateEventTermCommand
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $eventId;
    /**
     * @var \DateTime
     */
    private $term;
    /**
     * @var int
     */
    private $proposerId;

    public function __construct(int $id, int $eventId, \DateTime $term, int $proposerId)
    {
        $this->id         = $id;
        $this->eventId    = $eventId;
        $this->term       = $term;
        $this->proposerId = $proposerId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getTerm(): \DateTime
    {
        return $this->term;
    }

    /**
     * @return int
     */
    public function getEventId(): int
    {
        return $this->eventId;
    }

    /**
     * @return int
     */
    public function getProposerId(): int
    {
        return $this->proposerId;
    }
}
