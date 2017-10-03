<?php

namespace spec\HcsOmot\SocialCalendar\CalendarBundle\Command;

use HcsOmot\SocialCalendar\CalendarBundle\Command\CreateEventTermCommand;
use PhpSpec\ObjectBehavior;

class CreateEventTermCommandSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateEventTermCommand::class);
    }

    public function let(\DateTime $term)
    {
        $this->beConstructedWith($id = time(), $eventId = 6, $term, $termProposerId = 1);
    }
}
