<?php

declare(strict_types=1);

namespace PasswordValidation;

final class PasswordValidator
{
    /** @var PasswordRule[] */
    private iterable $rules;

    private HasCapitalLetter $hasCapitalLetter;

    public function __construct(iterable $rules = [])
    {
        $this->rules = $rules;
        $this->hasCapitalLetter = new HasCapitalLetter();
    }

    public function validate(string $password): bool
    {
        foreach ($this->rules as $rule) {
            if (!$rule->isValid($password)) {
                return false;
            }
        }

        if (str_contains($password, '_') === false) {
            return false;
        }

        if ($this->hasCapitalLetter->isValid($password)) return false;

        if (preg_match('/[a-z]/', $password) === 0) {
            return false;
        }

        if (preg_match('/\d/', $password) === 0) {
            return false;
        }

        return true;
    }

}
