<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $idRol
 * @property string $nombreRol
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Usuario> $usuarios
 * @property-read int|null $usuarios_count
 * @method static \Illuminate\Database\Eloquent\Builder|Rol newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rol newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rol query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rol whereIdRol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rol whereNombreRol($value)
 * @mixin \Eloquent
 */
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
