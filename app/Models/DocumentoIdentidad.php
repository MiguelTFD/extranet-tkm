<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $idDocumentoIdentidad
 * @property string $numeroDocumentoIdentidad
 * @property int $idTipoDocumentoIdentidad
 * @property int $idUsuario
 * @property-read \App\Models\TipoDocumentoIdentidad $tipoDocumentoIdentidad
 * @property-read \App\Models\Usuario $usuario
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentoIdentidad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentoIdentidad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentoIdentidad query()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentoIdentidad whereIdDocumentoIdentidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentoIdentidad whereIdTipoDocumentoIdentidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentoIdentidad whereIdUsuario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentoIdentidad whereNumeroDocumentoIdentidad($value)
 * @mixin \Eloquent
 */
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
