<?php

namespace spec\HcsOmot\SocialCalendar\CalendarBundle\Handler;

use Doctrine\ORM\EntityManager;
use HcsOmot\SocialCalendar\CalendarBundle\Command\EditEventCommand;
use HcsOmot\SocialCalendar\CalendarBundle\Handler\EditEventHandler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EditEventHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(EditEventHandler::class);
    }

    public function let(EntityManager $entityManager)
    {
        $this->beConstructedWith($entityManager);
    }

    public function it_should_handle_command(EditEventCommand $editEventCommand)
    {
        $this->handle($editEventCommand);
    }
}
