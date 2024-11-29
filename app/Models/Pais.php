<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $idPais
 * @property string $nombrePais
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Departamento> $departamentos
 * @property-read int|null $departamentos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Pais newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pais newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pais query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereIdPais($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereNombrePais($value)
 * @mixin \Eloquent
 */
class Pais extends Model
{
    use HasFactory;

    protected $table = 'pais';
    protected $primaryKey = 'idPais';

    public $timestamps = false;

    protected $fillable = [
        'nombrePais'
    ];

    public function departamentos(){
        return $this->hasMany(Departamento::class,'idDepartamento');
    }
}
