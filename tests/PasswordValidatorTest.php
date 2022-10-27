<?php

declare(strict_types=1);

namespace PasswordValidation;

use PHPUnit\Framework\TestCase;

class PasswordValidatorTest extends TestCase
{
    private PasswordValidator $sut;

    protected function setUp(): void
    {
        parent::setUp();

        $this->sut = new PasswordValidator([
                new HasMoreThan8Characters(),
                new HasUnderscore(),
                new HasUpperLetter(),
                new HasLowerCase(),
            ]
        );
    }

    public function testAnEmptyPasswordIsInvalid(): void
    {
        $this->assertFalse($this->sut->validate(''));
    }

    public function testAPasswordIsValid(): void
    {
        $this->assertTrue($this->sut->validate('azazezaeazerty_E69'));
    }

    public function testAPasswordHasLessThan8CharactersIsInvalid(): void
    {
        $this->assertFalse($this->sut->validate('1234567'));
    }

    public function testAPasswordWithoutCapitalLetterIsInvalid(): void
    {
        $this->assertFalse($this->sut->validate('azazezaeazerty'));
    }

    public function testAPasswordWithoutLowercaseLetterIsInvalid(): void
    {
        $this->assertFalse($this->sut->validate('AZAZEZAE1_AZERTY'));
    }

    public function testAPasswordWithoutDigitIsInvalid(): void
    {
        $this->assertFalse($this->sut->validate('aZAZEZAEAZERTY'));
    }

    public function testAPasswordWithoutUnderscoreIsInvalid(): void
    {
        $this->assertFalse($this->sut->validate('aZAZEZAEAZERTY69'));
    }
}
