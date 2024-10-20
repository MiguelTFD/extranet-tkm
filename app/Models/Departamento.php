<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

   // Relación muchos a uno: Un producto pertenece a una categoría
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'idPais');
    }

    // Relación uno a muchos: Un producto puede tener muchas imágenes
    public function provincias()
    {
        return $this->hasMany(Provincia::class, 'idDepartamento');
    }

}
