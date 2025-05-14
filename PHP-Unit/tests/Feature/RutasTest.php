<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RutasTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_ruta_home(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_ruta_help(): void
    {
        $response = $this->get('help');

        $response->assertStatus(200);
    }
}
