<?php

namespace PasswordValidation;

class ContainsNumber
{
    public function __invoke(string $password): int|false
    {
        return preg_match('/[0-9]/', $password);
    }
}