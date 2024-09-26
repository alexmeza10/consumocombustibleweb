<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class Usuarios_Model extends Model
{
    use HasFactory;

    public static function auth($request)
    {
        $contrasena = self::actualizarDatosSesion($request->correo);

        if (Hash::check($request->pass, $contrasena)) {
            if (session('activo') == '1') {
                if (session('usuario') && self::create_session($request)) {
                    return Redirect::to(url('index'));
                } else {
                    session()->flush();
                    return Redirect::to(url(''))->send()->with('danger', 'Error al querer iniciar sesion');
                }
            } else {
                session()->flush();
                return Redirect::to(url(''))->send()->with('danger', 'Usuario Inactivo, comunicate con el administrador');
            }
        } else {
            session()->flush();
            return Redirect::to(url(''))->send()->with('danger', 'Favor de verificar la contrasena');
        }
    }

    public static function actualizarDatosSesion($nomUsuario)
    {
        $usuario = DB::connection('sqlsrv')
            ->table('UsuariosMA')
            ->where('correo', $nomUsuario)
            ->Orwhere('Nombre', $nomUsuario)
            ->first();

        if (!$usuario) {
            session()->flush();
            return Redirect::to(url(''))->send()->with('danger', 'Usuario no encontrado, favor de validar');
        } else {
            session([
                'usuario'      => $usuario,
                'nomUsuario'   => $usuario->Nombre,
                'Area'         => $usuario->Area,
                'NombreComp'   => $usuario->NombreComp,
                'Seguimiento'  => $usuario->Seguimiento,
                'correo'       => $usuario->correo,
                'extension'    => $usuario->extension,
                'activo'       => $usuario->Activo,
                'Perfil'       => $usuario->Perfil,
                'Adm'          => $usuario->Adm,
                'deVentanilla' => $usuario->deVentanilla,
                'Direccion'    => $usuario->Direccion,
                'Modelo'       => $usuario->Modelo,
                'Observ_Act'   => $usuario->Observ_Act,
                'deEntregas'   => $usuario->deEntregas,
                'id_usuario'   => $usuario->id_usuario,
            ]);
            return $usuario->Contrasena;
        }
    }
    public static function postContraseña($request)
    {
        $correo = session('correo');
        $usuario = DB::connection('sqlsrv')->table('UsuariosMA')->where('correo', $correo)->first();

        if ($usuario && Hash::check($request->contra, $usuario->Contrasena)) {
            DB::connection('capturaweb')->table('UsuariosMA')->where('correo', $correo)->update(['Contrasena' => Hash::make($request->pass)]);
            return true;
        }
        return false;
    }
}
