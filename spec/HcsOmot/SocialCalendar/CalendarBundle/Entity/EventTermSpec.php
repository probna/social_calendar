<?php

namespace spec\HcsOmot\SocialCalendar\CalendarBundle\Entity;

use AppBundle\Entity\User;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\Event;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\EventTerm;
use PhpSpec\ObjectBehavior;

class EventTermSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(EventTerm::class);
    }

    public function let(Event $event, \DateTime $when, User $termProposer)
    {
        $this->beConstructedWith(time(), $event, $when, $termProposer);
    }

    public function it_should_make_term_proposer_automatically_vote_for_term(User $termProposer)
    {
        $this->getTermProposer()->shouldBe($termProposer);
    }

    public function it_should_not_allow_attendee_to_vote_for_same_term_twice(User $alreadyVoted)
    {
        $this->addTermVoter($alreadyVoted);

        $this->shouldThrow(\DomainException::class)->duringAddTermVoter($alreadyVoted);
    }

    public function it_should_be_able_to_automatically_adjust_term_score_when_user_votes(User $voter)
    {
        $this->addTermVoter($voter);
        $numberOfVoters = $this->getTermVotersCount();

        $this->getTermScore()->shouldBe($numberOfVoters);
    }

    public function it_should_be_able_to_automatically_adjust_term_score_when_multiple_users_votes(User $voter1, User $voter2, User $voter3)
    {
        $this->addTermVoter($voter1);
        $this->addTermVoter($voter2);
        $this->addTermVoter($voter3);

        $numberOfVoters = $this->getTermVotersCount();

        $this->getTermScore()->shouldBe($numberOfVoters);
    }
}
