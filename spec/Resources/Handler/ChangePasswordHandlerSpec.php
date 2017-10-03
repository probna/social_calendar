<?php

namespace spec\Resources\Handler;

use PhpSpec\ObjectBehavior;
use Resources\Command\ChangePassword;
use Resources\Handler\ChangePasswordHandler;

class ChangePasswordHandlerSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(ChangePasswordHandler::class);
    }

    public function it_will_not_change_password(ChangePassword $changePasswordCommand)
    {
        $this->handle($changePasswordCommand)->shouldReturn(false);
    }
}
