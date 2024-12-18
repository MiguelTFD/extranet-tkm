<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $idProvincia
 * @property string $nombreProvincia
 * @property int $idDepartamento
 * @property-read \App\Models\Departamento $departamento
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Distrito> $ditritos
 * @property-read int|null $ditritos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia query()
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia whereIdDepartamento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia whereIdProvincia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia whereNombreProvincia($value)
 * @mixin \Eloquent
 */
class Provincia extends Model
{
    use HasFactory;

    protected $table = 'provincia';
    protected $primaryKey = 'idProvincia';
    public $timestamps = false;

    protected $fillable= [
        'idDepartamento',
        'nombreProvincia'
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'idDepartamento');
    }

    public function ditritos()
    {
        return $this->hasMany(Distrito::class, 'idProvincia');
    }   
}
