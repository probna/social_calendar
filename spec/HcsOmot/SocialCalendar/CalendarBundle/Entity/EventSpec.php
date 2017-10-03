<?php

namespace spec\HcsOmot\SocialCalendar\CalendarBundle\Entity;

use AppBundle\Entity\User;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\Event;
use PhpSpec\ObjectBehavior;

class EventSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Event::class);
    }

    public function let(User $owner)
    {
        $this->beConstructedWith($id = 1234, $name = 'fun party', $description = 'descr', $venue = 'venue', $owner);
    }

    public function it_should_add_term_to_event(\DateTime $when, User $proposer)
    {
        $this->addAttendee($proposer);

        $this->addTerm(time(), $when, $proposer);

        $collectionOfTerms = $this->getCandidateTerms();

        $collectionOfTerms->count()->shouldBe(1);
    }

    public function it_should_not_add_term_to_event_if_term_exists(User $proposer)
    {
        $this->addAttendee($proposer);

        $this->addTerm(time(), new \DateTime('2016-01-01 13:00'), $proposer);
        $this->addTerm(time(), new \DateTime('2016-01-01 13:00'), $proposer);

        $collectionOfTerms = $this->getCandidateTerms();

        $collectionOfTerms->count()->shouldBe(1);
    }

    public function it_should_add_two_terms_to_event_if_they_dont_collide(User $proposer)
    {
        $this->addAttendee($proposer);

        $this->addTerm(time(), new \DateTime('2016-01-01 13:00'), $proposer);
        $this->addTerm(time(), new \DateTime('2016-01-01 13:01'), $proposer);

        $collectionOfTerms = $this->getCandidateTerms();

        $collectionOfTerms->count()->shouldBe(2);
    }

    public function it_should_not_add_term_to_event_if_user_not_invited(\DateTime $when, User $proposer)
    {
        $this->addTerm(time(), $when, $proposer);

        $collectionOfTerms = $this->getCandidateTerms();

        $collectionOfTerms->count()->shouldBe(0);
    }

    public function it_should_add_attendee(User $attendee)
    {
        $this->addAttendee($attendee);

        $attendees = $this->getAttendees();

        $attendees->count()->shouldBe(1);
    }

    public function it_should_not_add_same_attendee_multiple_times(User $attendee)
    {
        $this->addAttendee($attendee);
        $this->addAttendee($attendee);

        $attendees = $this->getAttendees();

        $attendees->count()->shouldBe(1);
    }

    public function it_should_allow_an_attendee_to_vote_for_an_event_term(\DateTime $term, User $termVoter, User $termProposer)
    {
        $this->addAttendee($termVoter);
        $this->addAttendee($termProposer);

        $this->addTerm(15, $term, $termProposer);
        $this->voteForTerm(15, $termVoter);

        $this->getEventTermVotersCount(15)->shouldReturn(2);
    }

    public function it_should_not_allow_non_attendees_to_vote(User $nonAttendee)
    {
        $this->shouldThrow(\DomainException::class)->duringVoteForTerm(15, $nonAttendee);
    }

    public function it_should_not_allow_an_attendee_to_vote_for_an_nonexisten_event_term(User $termVoter)
    {
        $this->addAttendee($termVoter);

        $this->shouldThrow(\DomainException::class)->duringVoteForTerm(15, $termVoter);
    }

    public function it_should_not_have_effect_if_term_proposer_tries_to_vote_for_proposed_term(\DateTime $term, User $termProposer)
    {
        $this->addAttendee($termProposer);

        $this->addTerm(15, $term, $termProposer);

        $this->shouldThrow(\DomainException::class)->duringVoteForTerm(15, $termProposer);

        $this->getEventTermVotersCount(15)->shouldBe(1);
    }
}
