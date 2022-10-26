<?php

namespace PasswordValidation;

class ContainsLowercaseLetter
{
    public function __invoke(string $password): int|false
    {
        return preg_match('/[a-z]/', $password);
    }
}