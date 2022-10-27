<?php

declare(strict_types=1);

namespace PasswordValidation;

final class HasMoreThan8Characters implements PasswordRule
{
    public function isValid(string $password): bool
    {
        return strlen($password) >= 8;
    }

}
