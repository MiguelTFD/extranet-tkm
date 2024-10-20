<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable 
{
    use HasFactory;

    protected $table = 'usuario';
    protected $primaryKey = 'idUsuario';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'idDireccion'
    ];
    
    protected $hidden = [
        'password'
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
    
    // Relacion Usuario  *-----1 Direccion
    public function direccion()
    {
        return $this->belongsTo(Direccion::class, 'idDireccion');
    }

    // Relación Usuario *-----* Rol (tabla pivote 'usuarioRol')
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'usuarioRol', 'idUsuario', 'idRol');
    }

    // Relación Usuario 1---1 DocIdentidad; 
    public function documentoIdentidad()
    {
        return $this->hasOne(DocumentoIdentidad::class, 'idUsuario');
    }
}
