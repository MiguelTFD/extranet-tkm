<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $idCategoria
 * @property string $nombreCategoria
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrdenCompra> $ordenesCompra
 * @property-read int|null $ordenes_compra_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Producto> $productos
 * @property-read int|null $productos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria query()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereIdCategoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereNombreCategoria($value)
 * @mixin \Eloquent
 */
class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';
    protected $primaryKey = 'idCategoria';

    public $timestamps = false;

    protected $fillable = [
        'nombreCategoria'    
    ];

    public function ordenesCompra()
    {
        return $this->belongsToMany(OrdenCompra::class, 'detalleOrden', 'idProducto', 'idOrdenCompra')->withPivot('cantidad');
    }


    public function productos()
    {
        return $this->hasMany(Producto::class, 'idCategoria');
    }
}
