<?php

namespace PasswordValidation;

class PasswordValidator
{
    public function validate(string $password): bool
    {
        return strlen($password) > 8
            && preg_match('/[A-Z]/', $password);
    }
}
