<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $table = 'direccion';
    protected $primaryKey = 'idDireccion';
    public $timestamps = false;

    protected $fillable = [
        'idDistrito',
        'direccionExacta',
        'referencia',
        'idTipoDireccion'
    ];
    
    //Direccion *------ 1 ordenCompra
    public function ordenes()
    {
        return $this->hasMany(OrdenCompra::class, 'idDireccion');
    }


    // Relación Direccion  *-----1 Distrito
    public function distrito()
    {
        return $this->belongsTo(Distrito::class, 'idDistrito');
    }

    //Relacion Direccion *-----1 TipoDireccion
    public function tipoDireccion()
    {
        return $this->belongsTo(TipoDireccion::class, 'idTipoDireccion');
    }
    
    // Relación con Usuario (tabla pivote 'direccionXusuario')
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'direccionXusuario', 'idDireccion', 'idUsuario');
    }




 
}
