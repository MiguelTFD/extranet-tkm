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
    ];
    
    protected $hidden = [
        'password'
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
    
    // Relacion Usuario  *-----* Direccion (tabla pivote 'direccionXusuario')
    public function direcciones()
    {
        return $this->belongsToMany(Direccion::class, 'direccionXusuario','idUsuario','idDireccion');
    }

    // Relación Usuario *-----* Rol (tabla pivote 'usuarioRol')
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'usuarioRol', 'idUsuario', 'idRol');
    }
    
    //Direccion *------ 1 ordenCompra
    public function ordenes()
    {
        return $this->hasMany(OrdenCompra::class, 'idUsuario');
    }

    // Relación Usuario 1---1 DocIdentidad; 
    public function documentoIdentidad()
    {
        return $this->hasOne(DocumentoIdentidad::class, 'idUsuario');
    }
}
