<?php

namespace spec\HcsOmot\SocialCalendar\CalendarBundle\Handler;

use Doctrine\ORM\EntityManager;
use HcsOmot\SocialCalendar\CalendarBundle\Command\EditEventCommand;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\Event;
use HcsOmot\SocialCalendar\CalendarBundle\Handler\EditEventHandler;
use HcsOmot\SocialCalendar\CalendarBundle\Repository\EventRepository;
use PhpSpec\ObjectBehavior;

class EditEventHandlerSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(EditEventHandler::class);
    }

    public function let(EntityManager $entityManager, EventRepository $eventRepository)
    {
        $this->beConstructedWith($entityManager, $eventRepository);
    }

    public function it_should_handle_command(
        EditEventCommand $editEventCommand,
        EntityManager $entityManager,
        EventRepository $eventRepository,
        Event $event
    ) {
        $editEventCommand->getId()->shouldBeCalled()->willReturn(2);
        $editEventCommand->getDescription()->shouldBeCalled()->willReturn('bla');
        $editEventCommand->getVenue()->shouldBeCalled()->willReturn('bla2');

        $event->setDescription('bla')->shouldBeCalled();
        $event->setVenue('bla2')->shouldBeCalled();
        $entityManager->persist($event)->shouldBeCalled();
        $entityManager->flush()->shouldBeCalled();
        $eventRepository->find(2)->shouldBeCalled()->willReturn($event);

        $this->handle($editEventCommand);
    }

    public function it_should_X(
        EditEventCommand $editEventCommand,
        EventRepository $eventRepository
    ) {
        $editEventCommand->getId()->shouldBeCalled()->willReturn(2);

        $eventRepository->find(2)->shouldBeCalled()->willReturn(null);

        $this->shouldThrow(\Exception::class)->duringHandle($editEventCommand);
    }
}
