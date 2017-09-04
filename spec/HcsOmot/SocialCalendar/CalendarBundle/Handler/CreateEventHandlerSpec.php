<?php

namespace spec\HcsOmot\SocialCalendar\CalendarBundle\Handler;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use HcsOmot\SocialCalendar\CalendarBundle\Command\CreateEventCommand;
use HcsOmot\SocialCalendar\CalendarBundle\Handler\CreateEventHandler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateEventHandlerSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateEventHandler::class);
    }

    public function let(EntityManager $entityManager)
    {
        $this->beConstructedWith($entityManager);
    }

    public function it_should_handle_command(CreateEventCommand $createEventCommand, User $owner)
    {
        $createEventCommand->getId()->willReturn(445);
        $createEventCommand->getName()->willReturn('richard, dear');
        $createEventCommand->getDescription()->willReturn('mind the cows!');
        $createEventCommand->getVenue()->willReturn('in England!');
        $createEventCommand->getOwner()->willReturn($owner);
        $this->handle($createEventCommand);

    }
}
