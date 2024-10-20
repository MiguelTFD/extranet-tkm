<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
