<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
