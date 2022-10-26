<?php

declare(strict_types=1);

namespace PasswordValidation;

use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    public function testEmptyPasswordIsInvalid(): void
    {
        $this->assertFalse((new PasswordValidator())->validate(''));
    }

    public function testTooShortPasswordIsInvalid(): void
    {
        $this->assertFalse((new PasswordValidator())->validate('A2345678'));
    }

    public function testPasswordIsValid(): void
    {
        $this->assertTrue((new PasswordValidator())->validate('A23456789'));
        $this->assertTrue((new PasswordValidator())->validate('AAAA56789'));
    }

    public function testPasswordWithoutCapitalLetterIsInvalid(): void
    {
        $this->assertFalse((new PasswordValidator())->validate('123456789'));
    }
}
