<?php

namespace PasswordValidation;

class HasLowerCase implements PasswordRule
{
    public function isValid(string $password): bool
    {
        return preg_match('/[a-z]/', $password) !== 0;
    }
}
