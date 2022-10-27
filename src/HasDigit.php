<?php

declare(strict_types=1);

namespace PasswordValidation;

final class HasDigit implements PasswordRule
{
    public function isValid(string $password): bool
    {
        return preg_match('/\d/', $password) !== 0;
    }
}
