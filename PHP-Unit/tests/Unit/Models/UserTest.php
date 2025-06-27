<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase; // Este trait se usa para reiniciar la base de datos entre pruebas

    public function test_user_table(): void
    {
        User::factory()->create([
            'email' => 'a@gmail.com',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'a@gmail.com',
        ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'b@gmail.com',
        ]);
    }
}
