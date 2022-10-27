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
        if (strlen($string) < 8) {
            return false;
        }

        if (str_contains($string, '_') === false) {
            return false;
        }

        if (preg_match('/[A-Z]/', $string) === 0) {
            return false;
        }

        if (preg_match('/[a-z]/', $string) === 0) {
            return false;
        }

        if (preg_match('/\d/', $string) === 0) {
            return false;
        }


        return true;
    }

}
