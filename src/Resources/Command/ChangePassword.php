<?php

namespace Resources\Command;

class ChangePassword
{
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $password;

    public function __construct(string $email, string $password)
    {
        $this->email    = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
