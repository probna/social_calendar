<?php

namespace spec\HcsOmot\SocialCalendar\CalendarBundle\Handler;

use AppBundle\Entity\User;
use AppBundle\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use HcsOmot\SocialCalendar\CalendarBundle\Command\CreateEventCommand;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\Event;
use HcsOmot\SocialCalendar\CalendarBundle\Handler\CreateEventHandler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateEventHandlerSpec extends ObjectBehavior {
    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateEventHandler::class);
    }

    public function let(EntityManager $entityManager, UserRepository $userRepository)
    {
        $this->beConstructedWith($entityManager, $userRepository);
    }

    public function it_should_handle_command(
        CreateEventCommand $createEventCommand,
        UserRepository $userRepository,
        User $eventOwner,
        EntityManager $entityManager
    )
    {
        $createEventCommand->getId()->willReturn(445);
        $createEventCommand->getName()->willReturn('summerfest madness');
        $createEventCommand->getDescription()->willReturn('description for summerfest event');
        $createEventCommand->getVenue()->willReturn('Great Halls of Valhalla');
        $createEventCommand->getOwnerID()->willReturn(1);


        $userRepository->find(1)->shouldBeCalled()->willReturn($eventOwner);


        $entityManager->persist(Argument::type(Event::class))->shouldBeCalled();
        $entityManager->flush()->shouldBeCalled();
        $this->handle($createEventCommand);

    }
}
