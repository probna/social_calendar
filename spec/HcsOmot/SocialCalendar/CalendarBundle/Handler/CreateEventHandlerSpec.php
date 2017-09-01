<?php

namespace spec\HcsOmot\SocialCalendar\CalendarBundle\Handler;

use HcsOmot\SocialCalendar\CalendarBundle\Command\CreateEventCommand;
use HcsOmot\SocialCalendar\CalendarBundle\Handler\CreateEventHandler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateEventHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CreateEventHandler::class);
    }

    public function it_should_handle_command(CreateEventCommand $createEventCommand)
    {
        $this->handle($createEventCommand);
    }
}
