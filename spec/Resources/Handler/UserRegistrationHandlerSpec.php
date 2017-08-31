<?php

namespace spec\Resources\Handler;

use Resources\Command\RegisterUser;
use Resources\Handler\UserRegistrationHandler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserRegistrationHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(UserRegistrationHandler::class);
    }

    public function it_will_register_user(RegisterUser $registerUserCommand)
    {
        $this->handle($registerUserCommand)->shouldReturn(true);
    }
}
