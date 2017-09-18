<?php

namespace spec\HcsOmot\SocialCalendar\CalendarBundle\Command;

use AppBundle\Entity\User;
use HcsOmot\SocialCalendar\CalendarBundle\Command\CreateEventTermCommand;
use HcsOmot\SocialCalendar\CalendarBundle\Entity\Event;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateEventTermCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CreateEventTermCommand::class);
    }

    public function let(Event $event, User $termProposer, \DateTime $term)
    {
        $this->beConstructedWith($id = time(), $event, $term, $termProposer);
    }

}
