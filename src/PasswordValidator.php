<?php

namespace PasswordValidation;

class PasswordValidator
{
    public function validate(string $password): bool
    {
        return strlen($password) > 8
            && preg_match('/[A-Z]/', $password)
            && preg_match('/[a-z]/', $password)
            && preg_match('/[0-9]/', $password)
            && str_contains($password, '_');
    }
}
