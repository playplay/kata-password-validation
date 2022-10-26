<?php

namespace PasswordValidation;

class PasswordValidator
{
    private ContainsLowercaseLetter $containsLowercaseLetter;
    private ContainsNumber $containsNumber;
    private ContainsUppercaseLetter $containsUppercaseLetter;
    private ContainsUnderscore $containsUnderscore;
    private HasValidLength $hasValidLength;

    public function __construct()
    {
        $this->containsLowercaseLetter = new ContainsLowercaseLetter();
        $this->containsNumber = new ContainsNumber();
        $this->containsUppercaseLetter = new ContainsUppercaseLetter();
        $this->containsUnderscore = new ContainsUnderscore();
        $this->hasValidLength = new HasValidLength();
    }

    public function validate(string $password, ): bool
    {
        return ($this->hasValidLength)($password, 8)
            && ($this->containsUppercaseLetter)($password)
            && ($this->containsLowercaseLetter)($password)
            && ($this->containsNumber)($password)
            && ($this->containsUnderscore)($password);
    }
}
