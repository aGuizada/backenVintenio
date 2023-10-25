<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resena extends Model
{
   protected $fillable = ['usuario_id', 'conductor_id', 'calificacion', 'comentario'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function conductor()
    {
        return $this->belongsTo(User::class, 'conductor_id');
    }
}
