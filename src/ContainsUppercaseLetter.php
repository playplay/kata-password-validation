<?php

namespace PasswordValidation;

class ContainsUppercaseLetter
{
    public function __invoke(string $password): int|false
    {
        return preg_match('/[A-Z]/', $password);
    }
}