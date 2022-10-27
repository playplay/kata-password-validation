<?php

declare(strict_types=1);

namespace PasswordValidation;

final class PasswordValidator
{
    /** @var PasswordRule[] */
    private iterable $rules;

    private HasUpperLetter $hasCapitalLetter;
    private HasLowerCase $hasLowerCase;
    private HasDigit $hasDigit;

    public function __construct(iterable $rules = [])
    {
        $this->rules = $rules;
        $this->hasLowerCase = new HasLowerCase();
        $this->hasDigit = new HasDigit();
    }

    public function validate(string $password): bool
    {
        foreach ($this->rules as $rule) {
            if (!$rule->isValid($password)) {
                return false;
            }
        }

        if ($this->Digit($password)) {
            return false;
        }

        return true;
    }

    /**
     * @param string $password
     *
     * @return bool
     */
    public function Digit(string $password): bool
    {
        return $this->hasDigit->Digit($password);
    }
}
