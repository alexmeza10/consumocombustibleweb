<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios_Model;
use App\Models\PinesResetContrasena;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function authLogin(Request $request)
    {
        return Usuarios_Model::auth($request);
    }

    public function authLogout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('admin')->with('success', 'Sessión cerrada');
    }

    /*
    public function generarPIN(Request $request)
    {
        // Obtener el usuario asociado al correo electrónico proporcionado
        $usuario = Usuario::where('correo_electronico', $request->input('correo'))->first();
        if (!$usuario) {
            // Usuario no encontrado
            return redirect()->back()->with('error', 'El correo electrónico no está registrado.');
        }

        // Generar un PIN aleatorio de 4 dígitos
        $pinCode = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);

        // Guardar el PIN generado en la tabla pines_reset_contrasena
        PinesResetContrasena::create([
            'id_usuario' => $usuario->id,
            'pin_code' => $pinCode,
            'fecha_generacion' => now(),
            'activo' => true,
        ]);

        // Aquí puedes enviar el PIN por correo electrónico al usuario

        return redirect()->back()->with('success', 'Se ha enviado un PIN al correo electrónico registrado.');
    }
    */
}
