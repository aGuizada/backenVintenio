<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'numero_telefono',
        'rol_id',
        'ubicacion_latitud',
        'ubicacion_longitud',
        'disponible',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'rol_id');
    }

    public function viajes()
    {
        return $this->hasMany(Viaje::class, 'usuario_id');
    }

    public function viajesComoConductor()
    {
        return $this->hasMany(Viaje::class, 'conductor_id');
    }

    public function resenas()
    {
        return $this->hasMany(Resena::class, 'usuario_id');
    }

    public function resenasComoConductor()
    {
        return $this->hasMany(Resena::class, 'conductor_id');
    }
}
