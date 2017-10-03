<?php

namespace spec\Resources\Handler;

use PhpSpec\ObjectBehavior;
use Resources\Command\RegisterUser;
use Resources\Handler\UserRegistrationHandler;

class UserRegistrationHandlerSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(UserRegistrationHandler::class);
    }

    public function it_will_register_user(RegisterUser $registerUserCommand)
    {
        $this->handle($registerUserCommand)->shouldReturn(true);
    }
}
