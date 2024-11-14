<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
