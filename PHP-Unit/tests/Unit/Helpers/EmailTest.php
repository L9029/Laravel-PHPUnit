<?php

namespace Tests\Unit\Helpers;

use PHPUnit\Framework\TestCase;
use App\Helpers\Email;

class EmailTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_email(): void
    {
        $email = "a@gmail.com";

        // $result = (bool) filter_var($email, FILTER_VALIDATE_EMAIL); // Valida el formato del email con solo php puro

        $result = Email::validate($email); // Valida el formato del email con la clase Email
        $this->assertTrue($result, "El email no es válido");

        $result = Email::validate("a@@.com"); // Valida el formato del email con la clase Email
        $this->assertFalse($result, "El email es válido");
    }
}
