<?php

namespace PasswordValidation;

class ContainsLowercaseLetter implements Rule
{
    public function __invoke(string $password): int|false
    {
        return preg_match('/[a-z]/', $password);
    }
}