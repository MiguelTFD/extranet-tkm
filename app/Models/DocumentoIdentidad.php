<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoIdentidad extends Model
{
    use HasFactory;

    protected $table = 'documentoIdentidad';
    protected $primaryKey = 'idDocumentoIdentidad';
    public $timestamps = false;

    protected $fillable = [
        'numeroDocumentoIdentidad',
        'idTipoDocumentoIdentidad',
        'idUsuario'
    ];

    //Relacion DocumentoIdentidad *---1 TipoDocumentoIdentidad
    public function tipoDocumentoIdentidad(){
        return $this->belongsTo(TipoDocumentoIdentidad::class,'idTipoDocumentoIdentidad');
    }
   
    // Relación inversa uno a uno con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

}
