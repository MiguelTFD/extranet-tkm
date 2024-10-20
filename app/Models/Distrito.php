<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

   // Relación muchos a uno: Una provinci pertenece a un departamento 
    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'idProvincia');
    }

    // Relación uno a muchos: Un producto puede tener muchas imágenes
    public function direcciones()
    {
        return $this->hasMany(Direccion::class, 'idDistrito');
    }
}
