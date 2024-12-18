<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $idProducto
 * @property int $idCategoria
 * @property string $nombreProducto
 * @property int $stockProducto
 * @property string $precioUnitario
 * @property string|null $descuento
 * @property string|null $descripcion
 * @property string|null $tamanio
 * @property string|null $peso
 * @property-read \App\Models\Categoria $categoria
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ImagenProducto> $imagenes
 * @property-read int|null $imagenes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Producto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereDescuento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereIdCategoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereIdProducto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereNombreProducto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto wherePeso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto wherePrecioUnitario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereStockProducto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereTamanio($value)
 * @mixin \Eloquent
 */
class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';
    protected $primaryKey = 'idProducto';

    public $timestamps = false;

    protected $fillable = [
        'idCategoria',
        'nombreProducto',
        'stockProducto',
        'precioUnitario',
        'descuento',
        'descripcion',
        'tamanio',
        'peso'
    ];

    protected $casts = [
        'precioUnitario' => 'decimal:2',  
        'descuento' => 'decimal:2',      
        'stockProducto' => 'integer',   
        'peso' => 'decimal:2',         
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }

    public function imagenes()
    {
        return $this->hasMany(ImagenProducto::class, 'idProducto');
    }
    
    public function obtenerImagenUrl()
    {
        return $this->imagenes->isNotEmpty() ? 
            $this->imagenes->first()->
            urlImagenProducto : asset('images/bf5k.png');
    }
}
