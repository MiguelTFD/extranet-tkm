<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $idDepartamento
 * @property string $nombreDepartamento
 * @property int $idPais
 * @property-read \App\Models\Pais $pais
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Provincia> $provincias
 * @property-read int|null $provincias_count
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento query()
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento whereIdDepartamento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento whereIdPais($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento whereNombreDepartamento($value)
 * @mixin \Eloquent
 */
class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamento';
    protected $primaryKey = 'idDepartamento';
    public $timestamps = false;

    protected $fillable= [
        'idPais',
        'nombreDepartamento'
    ];

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'idPais');
    }

    public function provincias()
    {
        return $this->hasMany(Provincia::class, 'idDepartamento');
    }

}
