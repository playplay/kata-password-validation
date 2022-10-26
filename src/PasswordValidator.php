<?php

namespace PasswordValidation;

class PasswordValidator
{
    private ContainsLowercaseLetter $containsLowercaseLetter;
    private ContainsNumber $containsNumber;

    public function __construct()
    {
        $this->containsLowercaseLetter = new ContainsLowercaseLetter();
        $this->containsNumber = new ContainsNumber();
    }

    public function validate(string $password): bool
    {
        return $this->hasValidLength($password, 8)
            && $this->containsUppercaseLetter($password)
            && ($this->containsLowercaseLetter)($password)
            && ($this->containsNumber)($password)
            && $this->containsUnderscore($password);
    }

    private function containsUnderscore(string $password): bool
    {
        return str_contains($password, '_');
    }

    private function containsUppercaseLetter(string $password): int|false
    {
        return preg_match('/[A-Z]/', $password);
    }

    private function hasValidLength(string $password, int $length): bool
    {
        return strlen($password) > $length;
    }
}
