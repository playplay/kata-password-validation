<?php

declare(strict_types=1);

namespace PasswordValidation;

final class PasswordValidator
{
    /** @var PasswordRule[] */
    private iterable $rules;

    private HasUpperLetter $hasCapitalLetter;
    private HasLowerCase $hasLowerCase;

    public function __construct(iterable $rules = [])
    {
        $this->rules = $rules;
        $this->hasLowerCase = new HasLowerCase();
    }

    public function validate(string $password): bool
    {
        foreach ($this->rules as $rule) {
            if (!$rule->isValid($password)) {
                return false;
            }
        }

        if (preg_match('/\d/', $password) === 0) {
            return false;
        }

        return true;
    }
}
