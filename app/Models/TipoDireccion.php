<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $idTipoDireccion
 * @property string $nombreTipo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Direccion> $direcciones
 * @property-read int|null $direcciones_count
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDireccion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDireccion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDireccion query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDireccion whereIdTipoDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDireccion whereNombreTipo($value)
 * @mixin \Eloquent
 */
class TipoDireccion extends Model
{
    use HasFactory;
    
    protected $table = 'tipoDireccion';
    protected $primaryKey = 'idTipoDireccion';

    public $timestamps = false;

    protected $fillable = [
        'nombreTipo'
    ];

    public function direcciones(){
        return $this->hasMany(Direccion::class,'idTipoDireccion');
    }

}
