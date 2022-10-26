<?php

namespace PasswordValidation;

class HasValidLength
{
    public function __invoke(string $password, int $length): bool
    {
        return strlen($password) > $length;
    }
}