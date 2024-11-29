<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * 
 *
 * @property int $idOrdenCompra
 * @property int $idUsuario
 * @property string $fechaOrdenCompra
 * @property string|null $informacionOrdenCompra
 * @property string|null $instruccionEntrega
 * @property int|null $idDireccion
 * @property string|null $tipoEntrega
 * @property string|null $metodoPago
 * @property string|null $estadoOrdenCompra
 * @property string|null $precioTotal
 * @property-read \App\Models\Direccion|null $direccion
 * @property-read mixed $fecha_orden_compra_formato
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Producto> $productos
 * @property-read int|null $productos_count
 * @property-read \App\Models\Usuario $usuario
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra whereEstadoOrdenCompra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra whereFechaOrdenCompra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra whereIdDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra whereIdOrdenCompra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra whereIdUsuario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra whereInformacionOrdenCompra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra whereInstruccionEntrega($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra whereMetodoPago($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra wherePrecioTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra whereTipoEntrega($value)
 * @mixin \Eloquent
 */
class OrdenCompra extends Model
{
    use HasFactory;
    
    protected $table = 'ordenCompra';
    protected $primaryKey = 'idOrdenCompra';
    public $timestamps;
    protected $fillable=[
        'idUsuario',
        'nombreTercero',
        'apellidoTercero',
        'tipoDocumentoTercero',
        'numeroDocumentoTercero',
        'telefonoTercero',
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
