<?php

namespace Resources\Handler;

use Resources\Command\ChangePassword;

class ChangePasswordHandler
{
    public function handle(ChangePassword $changePasswordCommand)
    {
        return false;
    }
}
