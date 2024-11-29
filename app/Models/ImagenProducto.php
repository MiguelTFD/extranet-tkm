<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $idImagenProducto
 * @property int $idProducto
 * @property string $urlImagenProducto
 * @property-read \App\Models\Producto $productos
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenProducto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenProducto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenProducto query()
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenProducto whereIdImagenProducto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenProducto whereIdProducto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenProducto whereUrlImagenProducto($value)
 * @mixin \Eloquent
 */
class ImagenProducto extends Model
{
    use HasFactory;

    protected $table = 'imagenProducto';
    protected $primaryKey = 'idImagenProducto';

    public $timestamps = false;
    

    protected $fillable = [
        'idProducto',
        'urlImagenProducto'
    ];

    public function productos()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }
}
