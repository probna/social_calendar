<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Command;

use AppBundle\Entity\User;

class EditEventCommand
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
     * @var \AppBundle\Entity\User
     */
    private $owner;

    public function __construct(int $id, string $name, string $description, string $venue, User $owner)
    {
        $this->id          = $id;
        $this->name        = $name;
        $this->description = $description;
        $this->venue       = $venue;
        $this->owner       = $owner;
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
     * @return \AppBundle\Entity\User
     */
    public function getOwner(): \AppBundle\Entity\User
    {
        return $this->owner;
    }
}
