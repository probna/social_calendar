<?php

namespace spec\HcsOmot\SocialCalendar\CalendarBundle\Handler;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use HcsOmot\SocialCalendar\CalendarBundle\Command\CreateEventTermCommand;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\Event;
use HcsOmot\SocialCalendar\CalendarBundle\Handler\CreateEventTermHandler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateEventTermHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CreateEventTermHandler::class);
    }

    public function let(EntityManager $entityManager)
    {
        $this->beConstructedWith($entityManager);
    }

    public function it_should_be_able_to_handle_create_eventterm_command(CreateEventTermCommand $createEventTermCommand, Event $event, \DateTime $term, User $proposer)
    {
        $createEventTermCommand->getId()->willReturn(5266);
        $createEventTermCommand->getEvent()->willReturn($event);
        $createEventTermCommand->getTerm()->willReturn($term);
        $createEventTermCommand->getProposer()->willReturn($proposer);

        $this->handle($createEventTermCommand);
    }
}
