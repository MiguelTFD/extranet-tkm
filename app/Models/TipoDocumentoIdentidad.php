<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $idTipoDocumentoIdentidad
 * @property string $nombreTipoDocumentoIdentidad
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DocumentoIdentidad> $documentosIdentidad
 * @property-read int|null $documentos_identidad_count
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDocumentoIdentidad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDocumentoIdentidad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDocumentoIdentidad query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDocumentoIdentidad whereIdTipoDocumentoIdentidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDocumentoIdentidad whereNombreTipoDocumentoIdentidad($value)
 * @mixin \Eloquent
 */
class TipoDocumentoIdentidad extends Model
{
    use HasFactory;

    protected $table = 'tipoDocumentoIdentidad';
    protected $primaryKey = 'idTipoDocumentoIdentidad';

    public $timestamps = false;

    protected $fillable = ['nombreTipoDocumentoIdentidad'];

    public function documentosIdentidad(){
        return $this->hasMany(
            DocumentoIdentidad::class, 
            'idTipoDocumentoIdentidad'
        ); 
    }
}
