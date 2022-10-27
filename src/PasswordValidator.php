<?php

declare(strict_types=1);

namespace PasswordValidation;

final class PasswordValidator
{
    /** @var PasswordRule[] */
    private iterable $rules;

    public function __construct(iterable $rules = [])
    {
        $this->rules = $rules;
    }

    public function validate(string $password): bool
    {
        foreach ($this->rules as $rule) {
            if (!$rule->isValid($password)) {
                return false;
            }
        }

        return true;
    }

    public function getErrors(string $password): array
    {
        $errors = [];
        foreach ($this->rules as $rule) {
            if (!$rule->isValid($password)) {
                $errors [] = $rule::class;
            }
        }

        return $errors;
    }
}
