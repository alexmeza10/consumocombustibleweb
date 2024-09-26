<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TokenVerify
{
    public function handle(Request $request, Closure $next)
    {
        $token = Session::token();
        $ipCliente = $request->ip();
        $agenteUsuario = $request->header('User-Agent');
        $inicioSesion = Carbon::now();

        $bandera = DB::connection('pgsql')
            ->table('sesiones')
            ->where('id_usuario', session('id_usuario'))
            ->where('token_sesion', $token)
            ->where('activa', true)
            ->where('inicio_sesion', '<=', $inicioSesion)
            ->exists();

        if ($bandera) {
            DB::connection('pgsql')
                ->table('sesiones')
                ->where('id_usuario', session('id_usuario'))
                ->where('token_sesion', $token)
                ->update([
                    'ultimo_acceso' => Carbon::now(),
                    'ip_cliente' => $ipCliente,
                    'agente_usuario' => $agenteUsuario,
                ]);
            return $next($request);
        } else {
            DB::connection('pgsql')
                ->table('sesiones')
                ->insert([
                    'id_usuario' => session('id_usuario'),
                    'token_sesion' => $token,
                    'ip_cliente' => $ipCliente,
                    'agente_usuario' => $agenteUsuario,
                    'inicio_sesion' => $inicioSesion,
                    'ultimo_acceso' => Carbon::now(),
                    'activa' => true,
                    'pin_code' => null,
                    'pin_code_generado' => null,
                    'pin_code_usado' => false,
                ]);
            session()->flush();
            return redirect('/')->with('sesionCerrada', 'La sesión ha caducado, favor inicia de nuevo');
        }
    }
}
