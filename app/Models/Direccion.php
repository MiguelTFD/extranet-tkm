<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $idDireccion
 * @property int $idDistrito
 * @property string|null $agencia
 * @property-read \App\Models\Distrito $distrito
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrdenCompra> $ordenes
 * @property-read int|null $ordenes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Usuario> $usuarios
 * @property-read int|null $usuarios_count
 * @method static \Illuminate\Database\Eloquent\Builder|Direccion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Direccion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Direccion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Direccion whereAgencia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direccion whereIdDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direccion whereIdDistrito($value)
 * @mixin \Eloquent
 */
class Direccion extends Model
{
    use HasFactory;

    protected $table = 'direccion';
    protected $primaryKey = 'idDireccion';
    public $timestamps = false;

    protected $fillable = [
        'idDistrito',
        'agencia',
        'sedeAgencia',
    ];
    
    public function ordenes()
    {
        return $this->hasMany(OrdenCompra::class, 'idDireccion');
    }

    public function distrito()
    {
        return $this->belongsTo(Distrito::class, 'idDistrito');
    }

    public function usuarios()
    {
        return $this->belongsToMany(
            Usuario::class, 
            'direccionXusuario', 
            'idDireccion', 
            'idUsuario'
        );
    }
}
