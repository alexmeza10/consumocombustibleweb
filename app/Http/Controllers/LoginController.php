<?php

namespace App\Http\Controllers;

use App\Models\Usuarios_Model;
use App\Models\PinesResetContrasena;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo_electronico' => 'required|email',
            'contrasena' => 'required',
        ]);

        $usuario = Usuarios_Model::where('correo_electronico', $request->correo_electronico)->first();

        if (!$usuario || !Hash::check($request->contrasena, $usuario->contrasena)) {
            return back()->withErrors([
                'correo_electronico' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
            ]);
        }

        // Autenticación exitosa, redireccionar al dashboard
        return redirect()->route('menu')->with('success', '¡Bienvenido de nuevo!');
    }


}
