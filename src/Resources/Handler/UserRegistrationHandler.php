<?php

namespace Resources\Handler;

use Resources\Command\RegisterUser;

class UserRegistrationHandler
{
    public function handle(RegisterUser $registerUserCommand)
    {
        return true;
    }
}
