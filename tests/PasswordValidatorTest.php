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
                new HasDigit(),
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
        $this->assertFalse($this->sut->validate('azazezaeazerty69_'));
    }

    public function testAPasswordWithoutLowercaseLetterIsInvalid(): void
    {
        $this->assertFalse($this->sut->validate('AZAZEZAE1_AZERTY69'));
    }

    public function testAPasswordWithoutDigitIsInvalid(): void
    {
        $this->assertFalse($this->sut->validate('aZAZEZAEAZERTY_'));
    }

    public function testAPasswordWithoutUnderscoreIsInvalid(): void
    {
        $this->assertFalse($this->sut->validate('aZAZEZAEAZERTY69'));
    }

    public function testItContainsHasMoreThan8CharactersError(): void
    {
        $errors = $this->sut->getErrors('fdjslfds');
        $this->assertContains(HasMoreThan8Characters::class, $errors);
    }
}
