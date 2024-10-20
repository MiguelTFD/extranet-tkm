<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

   // Relación muchos a uno: Una provinci pertenece a un departamento 
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'idDepartamento');
    }

    // Relación uno a muchos: Un producto puede tener muchas imágenes
    public function ditritos()
    {
        return $this->hasMany(Distrito::class, 'idProvincia');
    }   
}
