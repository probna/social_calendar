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
     * @var Event
     *
     * @ORM\ManyToOne(targetEntity="HcsOmot\SocialCalendar\CalendarBundle\Entity\Event", inversedBy="candidateTerms")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id", nullable=false)
     */
    private $event;

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
     * Set event
     *
     * @param Event $event
     *
     * @return Event
     */
    public function setEvent(Event $event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
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

    /**
     * Get string reporesentation of EventTerm entity
     *
     * @return string
     */
    public function __toString()
    {
        return $this->term->format('Y-m-d H:i:s');
    }


    /**
     * Performs a +1 vote for this Event Term
     */
    public function voteForTerm()
    {
        $this->termScore++;
    }
}

