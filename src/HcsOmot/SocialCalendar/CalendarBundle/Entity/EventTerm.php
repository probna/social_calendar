<?php

namespace HcsOmot\SocialCalendar\CalendarBundle\Entity;

use AppBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * EventTerm.
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
     * @ORM\Column(name="term_score", type="float", nullable=true)
     */
    private $termScore;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="term_proposer", referencedColumnName="id")
     */
    private $termProposer;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User", inversedBy="votedTerms")
     * @ORM\JoinTable(name="term_voters")
     */
    protected $termVoters;

    public function __construct()
    {
        $this->termVoters = new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getTermVoters(): Collection
    {
        return $this->termVoters;
    }

    /**
     * @param User $termVoter
     */
    public function addTermVoter(User $termVoter)
    {
        if (false === $this->termVoters->contains($termVoter)) {
            $this->termVoters->add($termVoter);
            $this->termScore = $this->termVoters->count();
        }
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
     * Set event.
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
     * Get event.
     *
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set term.
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
     * Get term.
     *
     * @return \DateTime
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * Set termScore.
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
     * Get termScore.
     *
     * @return float
     */
    public function getTermScore()
    {
        return $this->termScore;
    }

    /**
     * Get string reporesentation of EventTerm entity.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->term->format('Y-m-d H:i:s');
    }

    /**
     * @return User
     */
    public function getTermProposer(): User
    {
        return $this->termProposer;
    }

    /**
     * @param User $termProposer
     *
     * @return $this
     */
    public function setTermProposer(User $termProposer)
    {
        $this->termProposer = $termProposer;

        return $this;
    }
}
