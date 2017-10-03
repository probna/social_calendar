<?php

namespace spec\HcsOmot\SocialCalendar\CalendarBundle\Command;

use HcsOmot\SocialCalendar\CalendarBundle\Command\CreateEventCommand;
use PhpSpec\ObjectBehavior;

class CreateEventCommandSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateEventCommand::class);
    }

    public function let()
    {
        $this->beConstructedWith($id = time(), $name = 'bbq', $description = 'bbq party', $venue = 'bbq pit',
            $ownerId = 1);
    }
}
