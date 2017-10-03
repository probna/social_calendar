<?php

namespace spec\HcsOmot\SocialCalendar\CalendarBundle\Command;

use HcsOmot\SocialCalendar\CalendarBundle\Command\EditEventCommand;
use PhpSpec\ObjectBehavior;

class EditEventCommandSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(EditEventCommand::class);
    }

    public function let()
    {
        $this->beConstructedWith($id = time(), $name = 'bbq party', $description = 'best ev4h, brah',
            $venue = 'bbq pit');
    }
}
