<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'rol';
    protected $primaryKey = 'idRol';
    public $timestamps = false; // Si no tienes `created_at` o `updated_at`

    protected $fillable = ['nombreRol'];

    // Relación con Usuario (tabla pivote 'usuarioRol')
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuarioRol', 'idRol', 'idUsuario');
    }
}
