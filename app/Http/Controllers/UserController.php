<?php

namespace App\Http\Controllers;

use App\Models\Usuarios_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller

{
    public function store(Request $request)
    {
        try {
            // Validar los datos del formulario
            $validatedData = $request->validate([
                'nombre' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'username' => 'required|string|max:8|unique:usuarios,username|regex:/^[a-zA-Z]+$/u',
                'correo' => 'nullable|email|regex:/@zapopan\.gob\.mx$/i',
                'password' => 'required|string|min:8|confirmed',
                'num_empleado' => 'required|string|numeric|min:1|max:99999',
                'extension' => 'nullable|numeric|min:1|max:99999',
                'direccion' => 'nullable|string|max:255',
                'unidad' => 'nullable|string|max:255',
            ]);

            // Concatenar nombre y apellidos para formar el nombre completo
            $nombreCompleto = $validatedData['nombre'] . ' ' . $validatedData['apellidos'];

            // Hashear la contraseña antes de almacenarla en la base de datos
            $hashedPassword = Hash::make($validatedData['password']);

            // Crear el nuevo usuario con los datos validados y el nombre completo
            $usuario = new Usuarios_Model([
                'perfil' => 'usuario',
                'username' => $validatedData['username'],
                'nombre' => $validatedData['nombre'],
                'apellidos' => $validatedData['apellidos'],
                'nombrecompleto' => $nombreCompleto,
                'correo_electronico' => $validatedData['correo'] ?? null,
                'num_empleado' => $validatedData['num_empleado'],
                'contrasena' => $hashedPassword,
                'direccion' => $validatedData['direccion'] ?? null,
                'unidad' => $validatedData['unidad'] ?? null,
                'extension' => $validatedData['extension'] ?? null,
                'activo' => true,
                'verificado' => false,
                'rol'=> 'username'
            ]);

            // Guardar el usuario en la base de datos
            $usuario->save();

            // Redireccionar con mensaje de éxito
            return redirect()->route('user.index')->with('success', 'Usuario creado correctamente');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Devolver los errores de validación a la vista
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Manejar otros tipos de excepciones aquí
            return response()->json(['message' => 'Error al crear el usuario', 'error' => $e->getMessage()], 500);
        }
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // Realiza la búsqueda en la base de datos según tu criterio
        $usuarios = Usuarios_Model::where('nombrecompleto', 'like', "%$search%")
            ->orWhere('perfil', 'like', "%$search%")
            ->orWhere('verificado', 'like', "%$search%")
            ->get();

        return view('users.adminuser', ['usuarios' => $usuarios, 'search' => $search]);
    }
}
