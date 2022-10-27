<?php

declare(strict_types=1);

namespace PasswordValidation;

final class HasUnderscore implements PasswordRule
{
    public function isValid(string $password): bool
    {
        return str_contains($password, '_') !== false;
    }
}
