<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Command;

use AppBundle\Entity\User;

class CreateEventCommand
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $venue;
    /**
     * @var int
     */
    private $ownerID;

    public function __construct(int $id, string $name, string $description, string $venue, int $ownerID)
    {
        $this->id          = $id;
        $this->name        = $name;
        $this->description = $description;
        $this->venue       = $venue;
        $this->ownerID       = $ownerID;
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
    public function getName(): string
    {
        return $this->name;
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

    /**
     * @return int
     */
    public function getOwnerID(): int
    {
        return $this->ownerID;
    }
}
