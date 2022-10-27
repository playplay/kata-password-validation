<?php

declare(strict_types=1);

namespace PasswordValidation;

class HasUpperLetter implements PasswordRule
{

    /**
     * @param string $password
     *
     * @return bool
     */
    public function isValid(string $password): bool
    {
        return preg_match('/[A-Z]/', $password) !== 0;
    }
}
