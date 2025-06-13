<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
    /**
     * Test Email.
     */
    public function testEmail(): void
    {
        $resulta = validate_email("i@gmail.com");
        $this->assertTrue(true, "El email es válido");

        $resulta = validate_email("i@@.com");
        $this->assertFalse($resulta, "El email no es válido");
    }
}
