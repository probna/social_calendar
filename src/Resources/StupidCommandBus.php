<?php

namespace Resources;

use Resources\Command\ChangePassword;
use Resources\Command\RegisterUser;
use Resources\Handler\ChangePasswordHandler;
use Resources\Handler\UserRegistrationHandler;

class StupidCommandBus
{
    public function doWork($command)
    {
        if ($command instanceof RegisterUser) {
            $handler = new UserRegistrationHandler();
        } elseif ($command instanceof ChangePassword) {
            $handler = new ChangePasswordHandler();
        }else{
            throw new \Exception('no supported commands found');
        }

        return $handler->handle($command);
    }
}
