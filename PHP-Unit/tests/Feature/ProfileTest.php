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

        // Desactiva los middleware para pruebas
        // $this->withoutMiddleware();

        // Recomendable usar el token CSRF para evitar problemas de seguridad.
        $getResponse = $this->get('profile'); // Obtiene la vista del perfil para asegurarse de que el token CSRF esté presente.
        $token = csrf_token();

        // Simula una solicitud POST a la ruta "profile" con un archivo de imagen falso.
        $response = $this->post("profile", [
            "photo" => $photo = UploadedFile::fake()->image("photo.png"),
            "_token" => $token, // Incluye el token CSRF
        ]);

        // Verifica que el archivo se haya almacenado correctamente en el disco local.
        Storage::disk("local")->assertExists("profiles/{$photo->hashName()}"); 

        $response->assertRedirect("profile");
    }

    public function test_photo_required() 
    {
        $getResponse = $this->get('profile');
        $token = csrf_token();

        $response = $this->post("profile", [
            "photo" => null,
            "_token" => $token
        ]);

        // Verifica que exista un error de validación para el campo "photo".
        $response->assertSessionHasErrors("photo");
    }
}
