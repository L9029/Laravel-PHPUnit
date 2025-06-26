<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileControler extends Controller
{
    public function upload_file(Request $request)
    {
        // Validar el archivo de imagen
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Almacenar el archivo en el disco local
        $path = $request->file('photo')->store('profiles', 'local');

        // Redirigir a la vista del perfil
        return redirect('profile')->with('success', 'Archivo subido correctamente: ' . $path);
    }
}
