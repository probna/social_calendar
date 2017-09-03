<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Command;

class EditEventCommand
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $venue;

    public function __construct(int $id, string $description, string $venue)
    {
        $this->id          = $id;
        $this->description = $description;
        $this->venue       = $venue;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getVenue(): string
    {
        return $this->venue;
    }
}
