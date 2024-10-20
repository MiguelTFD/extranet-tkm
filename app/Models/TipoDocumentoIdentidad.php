<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumentoIdentidad extends Model
{
    use HasFactory;

    protected $table = 'tipoDocumentoIdentidad';
    protected $primaryKey = 'idTipoDocumentoIdentidad';

    public $timestamps = false;

    protected $fillable = ['nombreTipoDocumentoIdentidad'];

    public function documentosIdentidad(){
       return $this->hasMany(DocumentoIdentidad::class, 'idTipoDocumentoIdentidad'); 
    }


}
