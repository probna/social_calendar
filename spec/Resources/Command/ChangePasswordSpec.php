<?php

namespace spec\Resources\Command;

use Resources\Command\ChangePassword;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ChangePasswordSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ChangePassword::class);
    }

    public function let()
    {
        $this->beConstructedWith("tomo@ex.com", "pass123");
    }

    public function it_returns_email()
    {
        $this->getEmail()->shouldReturn("tomo@ex.com");
    }

    public function it_returns_password()
    {
        $this->getPassword()->shouldReturn("pass123");
    }
}
