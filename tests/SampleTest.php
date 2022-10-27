<?php

declare(strict_types=1);

namespace PasswordValidation;

use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    private PasswordValidator $sut;

    protected function setUp(): void
    {
        parent::setUp();

        $this->sut = new PasswordValidator();
    }

    public function testAnEmptyPasswordIsInvalid(): void
    {
        $this->assertFalse($this->sut->validate(''));
    }
}
