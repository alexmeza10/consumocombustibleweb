<?php

namespace App\Models;

use App\Http\Controllers\LoginController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinesResetContrasena extends Model
{
    use HasFactory;

    protected $table = 'pines_reset_contrasena'; // Nombre de la tabla

    protected $fillable = [
        'id_usuario',
        'pin_code',
        'fecha_generacion',
        'activo',
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(LoginController::class, 'id_usuario', 'id');
    }
}
