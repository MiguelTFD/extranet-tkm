<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    use HasFactory;
    
    protected $table = 'ordenCompra';
    protected $primaryKey = 'idOrdenCompra';
    public $timestamps;
    protected $fillable=[
        'idUsuario',
        'fechaOrdenCompra',
        'informacionOrdenCompra',
        'instruccionEntrega',
        'idDireccion',
        'tipoEntrega',
        'metodoPago',
        'estadoOrdenCompra'
    ];
    //muchas ordenes de compra pueden pertenecer a un usuario 
    public function usuario(){
        return $this->belongsTo(Usuario::class,'idUsuario');
    }


    public function productos()
    {
        return $this->belongsToMany(
            Producto::class, 
            'detalleOrden', 
            'idOrdenCompra', 
            'idProducto'
        )->withPivot('cantidad');
    }

    //muchas ordenes de compra pueden tener la misma direccion
    public function direccion(){
        return $this->belongsTo(Direccion::class,'idDireccion');
    }

}
