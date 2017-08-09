<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventTerm
 *
 * @ORM\Table(name="event_term")
 * @ORM\Entity(repositoryClass="HcsOmot\SocialCalendar\CalendarBundle\Repository\EventTermRepository")
 */
class EventTerm
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="event_id", type="integer")
     */
    private $eventId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="term", type="datetime")
     */
    private $term;

    /**
     * @var float
     *
     * @ORM\Column(name="term_score", type="float")
     */
    private $termScore;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set eventId
     *
     * @param integer $eventId
     *
     * @return EventTerm
     */
    public function setEventId($eventId)
    {
        $this->eventId = $eventId;

        return $this;
    }

    /**
     * Get eventId
     *
     * @return int
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * Set term
     *
     * @param \DateTime $term
     *
     * @return EventTerm
     */
    public function setTerm($term)
    {
        $this->term = $term;

        return $this;
    }

    /**
     * Get term
     *
     * @return \DateTime
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * Set termScore
     *
     * @param float $termScore
     *
     * @return EventTerm
     */
    public function setTermScore($termScore)
    {
        $this->termScore = $termScore;

        return $this;
    }

    /**
     * Get termScore
     *
     * @return float
     */
    public function getTermScore()
    {
        return $this->termScore;
    }
}

