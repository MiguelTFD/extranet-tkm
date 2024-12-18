<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * 
 *
 * @property int $idUsuario
 * @property string $username
 * @property string $password
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono
 * @property string $correo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Direccion> $direcciones
 * @property-read int|null $direcciones_count
 * @property-read \App\Models\DocumentoIdentidad|null $documentoIdentidad
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrdenCompra> $ordenes
 * @property-read int|null $ordenes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Rol> $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereCorreo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereIdUsuario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUsername($value)
 * @mixin \Eloquent
 */
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
    
    public function direcciones()
    {
        return $this->belongsToMany(
            Direccion::class, 
            'direccionXusuario',
            'idUsuario',
            'idDireccion'
        );
    }

    public function roles()
    {
        return $this->belongsToMany(
            Rol::class, 
            'usuarioRol', 
            'idUsuario', 
            'idRol'
        );
    }
    
    public function ordenes()
    {
        return $this->hasMany(
            OrdenCompra::class, 
            'idUsuario'
        );
    }

    public function documentoIdentidad()
    {
        return $this->hasOne(
            DocumentoIdentidad::class, 
            'idUsuario'
        );
    }
}
