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
}
