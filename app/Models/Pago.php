<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
      protected $fillable = ['viaje_id', 'monto', 'metodo_pago'];

    public function viaje()
    {
        return $this->belongsTo(Viaje::class, 'viaje_id');
    }
}
