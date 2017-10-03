<?php

namespace spec\Resources\Command;

use PhpSpec\ObjectBehavior;
use Resources\Command\RegisterUser;

class RegisterUserSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(RegisterUser::class);
    }

    public function let()
    {
        $this->beConstructedWith('tomo@ex.com', 'pass123');
    }

    public function it_returns_email()
    {
        $this->getEmail()->shouldReturn('tomo@ex.com');
    }

    public function it_returns_password()
    {
        $this->getPassword()->shouldReturn('pass123');
    }
}
