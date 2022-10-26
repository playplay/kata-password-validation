<?php

declare(strict_types=1);

namespace PasswordValidation;

use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    public function testEmptyPasswordIsInvalid() {
        $this->assertFalse((new PasswordValidator())->validate(''));
    }

    public function testTooShortPasswordIsInvalid() {
        $this->assertFalse((new PasswordValidator())->validate('12345678'));
    }

    public function testNineCharacterPasswordIsValid() {
        $this->assertTrue((new PasswordValidator())->validate('123456789'));
    }
}
