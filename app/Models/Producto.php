<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'precioUnitario' => 'decimal:2',  // Precio con dos decimales
        'descuento' => 'decimal:2',       // Descuento con dos decimales
        'stockProducto' => 'integer',     // El stock es un entero
        'peso' => 'decimal:2',            // El peso es decimal con dos decimales
    ];

    // Relación muchos a uno: Un producto pertenece a una categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }

    // Relación uno a muchos: Un producto puede tener muchas imágenes
    public function imagenes()
    {
        return $this->hasMany(ImagenProducto::class, 'idProducto');
    }


}
