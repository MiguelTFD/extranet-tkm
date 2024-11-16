<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        'precioTotal',
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
    public function getFechaOrdenCompraFormatoAttribute()
{
    return Carbon::parse($this->fechaOrdenCompra)->translatedFormat('j \d\e F \d\e\l Y');
}
}
