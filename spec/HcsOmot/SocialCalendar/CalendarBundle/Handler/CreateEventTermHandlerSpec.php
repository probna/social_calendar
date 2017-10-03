<?php

namespace spec\HcsOmot\SocialCalendar\CalendarBundle\Handler;

use AppBundle\Entity\User;
use AppBundle\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use HcsOmot\SocialCalendar\CalendarBundle\Command\CreateEventTermCommand;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\Event;
use HcsOmot\SocialCalendar\CalendarBundle\Handler\CreateEventTermHandler;
use HcsOmot\SocialCalendar\CalendarBundle\Repository\EventRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateEventTermHandlerSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateEventTermHandler::class);
    }

    public function let(EntityManager $entityManager, EventRepository $eventRepository, UserRepository $userRepository)
    {
        $this->beConstructedWith($entityManager, $eventRepository, $userRepository);
    }

    public function it_should_be_able_to_handle_create_eventterm_command(CreateEventTermCommand $createEventTermCommand, EventRepository $eventRepository, Event $event, \DateTime $term, UserRepository $userRepository, User $eventTermProposer, EntityManager $entityManager)
    {
        $createEventTermCommand->getId()->shouldBeCalled()->willReturn(5266);
        $createEventTermCommand->getEventId()->shouldBeCalled()->willReturn(6);

        $eventRepository->find(6)->shouldBeCalled()->willReturn($event);

        $createEventTermCommand->getTerm()->shouldBeCalled()->willReturn($term);

        $createEventTermCommand->getProposerId()->shouldBeCalled()->willReturn(1);

        $userRepository->find(1)->shouldBeCalled()->willReturn($eventTermProposer);

        $entityManager->persist(Argument::type(Event::class))->shouldBeCalled();
        $entityManager->flush()->shouldBeCalled();

        $this->handle($createEventTermCommand);
    }
}
