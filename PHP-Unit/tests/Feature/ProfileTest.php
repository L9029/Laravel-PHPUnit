<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProfileTest extends TestCase
{
    public function test_upload_file(): void
    {
        Storage::fake("local");

        $response = $this->post("profile", [
            "photo" => $photo = UploadedFile::fake()->image("photo.png")
        ]);

        // Verifica que el archivo se haya almacenado correctamente en el disco local.
        Storage::disk("local")->assertExists("profiles/{$photo->hashName()}"); 

        $response->assertRedirect("profile");
    }
}
