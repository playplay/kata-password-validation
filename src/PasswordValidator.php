<?php

declare(strict_types=1);

namespace PasswordValidation;

final class PasswordValidator
{
    public function __construct()
    {
    }

    public function validate(string $string): bool
    {
        return strlen($string) > 8;
    }

}
