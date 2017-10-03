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
     * @ORM\GeneratedValue(strategy="NONE")
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
    private $termVoters;

    /**
     * EventTerm constructor.
     *
     * @param int                                                 $id
     * @param \HcsOmot\SocialCalendar\CalendarBundle\Entity\Event $event
     * @param \DateTime                                           $term
     * @param User                                                $termProposer
     */
    public function __construct(int $id, Event $event, \DateTime $term, User $termProposer)
    {
        $this->id             = $id;
        $this->event          = $event;
        $this->term           = $term;
        $this->termProposer   = $termProposer;

        $this->termVoters     = new ArrayCollection();

        $this->addTermVoter($termProposer);
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get event.
     *
     * @return Event
     */
    public function getEvent(): Event
    {
        return $this->event;
    }

    /**
     * Get term.
     *
     * @return \DateTime
     */
    public function getTerm(): \DateTime
    {
        return $this->term;
    }

    /**
     * @return User
     */
    public function getTermProposer(): User
    {
        return $this->termProposer;
    }

    /**
     * @param User $termVoter
     */
    public function addTermVoter(User $termVoter)
    {
        if (false === $this->termVoters->contains($termVoter)) {
            $this->termVoters->add($termVoter);
            $this->adjustTermScore();
        }
    }

    /**
     * @return Collection
     */
    public function getTermVoters(): Collection
    {
        return $this->termVoters;
    }

    public function getTermVotersCount(): int
    {
        return $this->termVoters->count();
    }

    /**
     * Set termScore.
     *
     * @return \HcsOmot\SocialCalendar\CalendarBundle\Entity\EventTerm
     *
     * @internal param float $termScore
     */
    private function adjustTermScore()
    {
        $this->termScore = $this->termVoters->count();
    }

    /**
     * Get termScore.
     *
     * @return mixed
     */
    public function getTermScore()
    {
        return $this->termScore;
    }

    /**
     * Get string representation of EventTerm entity.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->term->format('Y-m-d H:i:s');
    }
}
