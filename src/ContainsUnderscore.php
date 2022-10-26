<?php

namespace PasswordValidation;

class ContainsUnderscore
{
    public function __invoke(string $password): bool
    {
        return str_contains($password, '_');
    }
}