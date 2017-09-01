<?php

namespace spec\HcsOmot\SocialCalendar\CalendarBundle\Command;

use AppBundle\Entity\User;
use HcsOmot\SocialCalendar\CalendarBundle\Command\EditEventCommand;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EditEventCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(EditEventCommand::class);
    }

    public function let(User $owner)
    {
        $this->beConstructedWith($id = time(), $name = 'bbq party', $description = 'best ev4h, brah',
            $venue = 'bbq pit', $owner);
    }
}
