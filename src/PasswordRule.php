<?php

declare(strict_types=1);

namespace PasswordValidation;

interface PasswordRule
{
    public function isValid(string $password): bool;
}
