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
        $this->assertTrue((new PasswordValidator())->validate('Aa3_56789'));
        $this->assertTrue((new PasswordValidator())->validate('AAAAa6_89'));
        $this->assertTrue((new PasswordValidator())->validate('AAaa5_789'));
    }

    public function testPasswordWithoutCapitalLetterIsInvalid(): void
    {
        $this->assertFalse((new PasswordValidator())->validate('123456789'));
    }

    public function testPasswordWithoutLowercaseLetterIsInvalid(): void
    {
        $this->assertFalse((new PasswordValidator())->validate('A23456789'));
    }

    public function testPasswordWithoutANumberIsInvalid(): void
    {
        $this->assertFalse((new PasswordValidator())->validate('AaaFOOBAR'));
    }

    public function testPasswordWithoutUnderscoreIsInvalid(): void
    {
        $this->assertFalse((new PasswordValidator())->validate('AaaF00BAR'));
    }
}
