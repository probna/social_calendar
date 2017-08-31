<?php

namespace spec\Resources\Handler;

use Resources\Command\ChangePassword;
use Resources\Handler\ChangePasswordHandler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ChangePasswordHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ChangePasswordHandler::class);
    }

    public function it_will_not_change_password(ChangePassword $changePasswordCommand)
    {
        $this->handle($changePasswordCommand)->shouldReturn(false);
    }
}
