<?php

namespace spec\HcsOmot\SocialCalendar\CalendarBundle\Command;

use AppBundle\Entity\User;
use HcsOmot\SocialCalendar\CalendarBundle\Command\CreateEventCommand;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateEventCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CreateEventCommand::class);
    }

    public function let(User $owner)
    {
        $this->beConstructedWith($id = time(), $name = 'bbq', $description = 'bbq party', $venue = 'bbq pit', $owner);
    }
}
