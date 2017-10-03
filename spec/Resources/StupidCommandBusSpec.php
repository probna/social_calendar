<?php

namespace spec\Resources;

use PhpSpec\ObjectBehavior;
use Resources\Command\ChangePassword;
use Resources\Command\RegisterUser;
use Resources\StupidCommandBus;

class StupidCommandBusSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(StupidCommandBus::class);
    }

    public function it_should_handle_register_user_command(RegisterUser $registerUserCommand)
    {
        $this->doWork($registerUserCommand)->shouldReturn(true);
    }

    public function it_should_handle_password_change(ChangePassword $changePasswordCommand)
    {
        $this->doWork($changePasswordCommand)->shouldReturn(false);
    }
}
