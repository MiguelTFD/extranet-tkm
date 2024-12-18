<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $idDistrito
 * @property string $nombreDistrito
 * @property int $idProvincia
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Direccion> $direcciones
 * @property-read int|null $direcciones_count
 * @property-read \App\Models\Provincia $provincia
 * @method static \Illuminate\Database\Eloquent\Builder|Distrito newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Distrito newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Distrito query()
 * @method static \Illuminate\Database\Eloquent\Builder|Distrito whereIdDistrito($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Distrito whereIdProvincia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Distrito whereNombreDistrito($value)
 * @mixin \Eloquent
 */
class Distrito extends Model
{
    use HasFactory;
    
    protected $table = 'distrito';
    protected $primaryKey = 'idDistrito';
    public $timestamps = false;

    protected $fillable= [
        'idProvincia',
        'nombreDistrito'
    ];

    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'idProvincia');
    }

    public function direcciones()
    {
        return $this->hasMany(Direccion::class, 'idDistrito');
    }
}
