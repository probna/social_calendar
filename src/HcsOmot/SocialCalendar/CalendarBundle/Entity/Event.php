<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Entity;

use AppBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Event.
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="HcsOmot\SocialCalendar\CalendarBundle\Repository\EventRepository")
 */
class Event
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="HcsOmot\SocialCalendar\CalendarBundle\Entity\EventTerm", mappedBy="eventId")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="venue", type="string", length=255, nullable=false)
     */
    private $venue;

    /**
     * Final term picked for event.
     *
     * @var \DateTime
     *
     * @ORM\Column(name="event_term", type="datetime", nullable=true)
     */
    private $eventTerm;

    /**
     * List of associated terms.
     *
     * This holds all the terms that were candidates for a final term
     *
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="HcsOmot\SocialCalendar\CalendarBundle\Entity\EventTerm", mappedBy="event")
     */
    private $candidateTerms;

    /**
     * Event owner.
     *
     * @var User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="ownedEvents")
     * @ORM\JoinColumn(name="owner", referencedColumnName="id")
     */
    private $owner;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User", mappedBy="attends")
     * @ORM\JoinTable(name="event_attendees")
     */
    private $attendees;

    public function __construct()
    {
        $this->candidateTerms = new ArrayCollection();
        $this->attendees      = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Event
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set venue.
     *
     * @param string $venue
     *
     * @return Event
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;

        return $this;
    }

    /**
     * Get venue.
     *
     * @return string
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * Set time.
     *
     * @param \DateTime $eventTerm
     *
     * @return Event
     */
    public function seteventTerm($eventTerm)
    {
        $this->eventTerm = $eventTerm;

        return $this;
    }

    /**
     * Get event term.
     *
     * @return \DateTime
     */
    public function geteventTerm()
    {
        return $this->eventTerm;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getCandidateTerms()
    {
        return $this->candidateTerms;
    }
}
