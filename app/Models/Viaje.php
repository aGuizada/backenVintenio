<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    protected $fillable = ['usuario_id', 'conductor_id', 'fecha_hora_solicitud', 'origen_latitud', 'origen_longitud', 'destino_latitud', 'destino_longitud', 'estado_viaje', 'costo', 'metodo_pago'];

    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function conductor()
    {
        return $this->belongsTo(User::class, 'conductor_id');
    }

    public function pago()
    {
        return $this->hasOne(Pago::class, 'viaje_id');
    }

    public function resena()
    {
        return $this->hasOne(Resena::class, 'viaje_id');
    }
}
