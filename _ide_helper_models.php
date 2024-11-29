<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $idCategoria
 * @property string $nombreCategoria
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrdenCompra> $ordenesCompra
 * @property-read int|null $ordenes_compra_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Producto> $productos
 * @property-read int|null $productos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria query()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereIdCategoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereNombreCategoria($value)
 */
	class Categoria extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $idDepartamento
 * @property string $nombreDepartamento
 * @property int $idPais
 * @property-read \App\Models\Pais $pais
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Provincia> $provincias
 * @property-read int|null $provincias_count
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento query()
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento whereIdDepartamento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento whereIdPais($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departamento whereNombreDepartamento($value)
 */
	class Departamento extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $idDireccion
 * @property int $idDistrito
 * @property string|null $agencia
 * @property-read \App\Models\Distrito $distrito
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrdenCompra> $ordenes
 * @property-read int|null $ordenes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Usuario> $usuarios
 * @property-read int|null $usuarios_count
 * @method static \Illuminate\Database\Eloquent\Builder|Direccion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Direccion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Direccion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Direccion whereAgencia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direccion whereIdDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Direccion whereIdDistrito($value)
 */
	class Direccion extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $idDistrito
 * @property string $nombreDistrito
 * @property int $idProvincia
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Direccion> $direcciones
 * @property-read int|null $direcciones_count
 * @property-read \App\Models\Provincia $provincia
 * @method static \Illuminate\Database\Eloquent\Builder|Distrito newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Distrito newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Distrito query()
 * @method static \Illuminate\Database\Eloquent\Builder|Distrito whereIdDistrito($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Distrito whereIdProvincia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Distrito whereNombreDistrito($value)
 */
	class Distrito extends \Eloquent {}
}

namespace App\Models{
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
 */
	class DocumentoIdentidad extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $idImagenProducto
 * @property int $idProducto
 * @property string $urlImagenProducto
 * @property-read \App\Models\Producto $productos
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenProducto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenProducto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenProducto query()
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenProducto whereIdImagenProducto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenProducto whereIdProducto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenProducto whereUrlImagenProducto($value)
 */
	class ImagenProducto extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $idOrdenCompra
 * @property int $idUsuario
 * @property string $fechaOrdenCompra
 * @property string|null $informacionOrdenCompra
 * @property string|null $instruccionEntrega
 * @property int|null $idDireccion
 * @property string|null $tipoEntrega
 * @property string|null $metodoPago
 * @property string|null $estadoOrdenCompra
 * @property string|null $precioTotal
 * @property-read \App\Models\Direccion|null $direccion
 * @property-read mixed $fecha_orden_compra_formato
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Producto> $productos
 * @property-read int|null $productos_count
 * @property-read \App\Models\Usuario $usuario
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra whereEstadoOrdenCompra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra whereFechaOrdenCompra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra whereIdDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra whereIdOrdenCompra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra whereIdUsuario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra whereInformacionOrdenCompra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra whereInstruccionEntrega($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra whereMetodoPago($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra wherePrecioTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrdenCompra whereTipoEntrega($value)
 */
	class OrdenCompra extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $idPais
 * @property string $nombrePais
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Departamento> $departamentos
 * @property-read int|null $departamentos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Pais newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pais newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pais query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereIdPais($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereNombrePais($value)
 */
	class Pais extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $idProducto
 * @property int $idCategoria
 * @property string $nombreProducto
 * @property int $stockProducto
 * @property string $precioUnitario
 * @property string|null $descuento
 * @property string|null $descripcion
 * @property string|null $tamanio
 * @property string|null $peso
 * @property-read \App\Models\Categoria $categoria
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ImagenProducto> $imagenes
 * @property-read int|null $imagenes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Producto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereDescuento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereIdCategoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereIdProducto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereNombreProducto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto wherePeso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto wherePrecioUnitario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereStockProducto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereTamanio($value)
 */
	class Producto extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $idProvincia
 * @property string $nombreProvincia
 * @property int $idDepartamento
 * @property-read \App\Models\Departamento $departamento
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Distrito> $ditritos
 * @property-read int|null $ditritos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia query()
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia whereIdDepartamento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia whereIdProvincia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provincia whereNombreProvincia($value)
 */
	class Provincia extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $idRol
 * @property string $nombreRol
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Usuario> $usuarios
 * @property-read int|null $usuarios_count
 * @method static \Illuminate\Database\Eloquent\Builder|Rol newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rol newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rol query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rol whereIdRol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rol whereNombreRol($value)
 */
	class Rol extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $idTipoDireccion
 * @property string $nombreTipo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Direccion> $direcciones
 * @property-read int|null $direcciones_count
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDireccion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDireccion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDireccion query()
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDireccion whereIdTipoDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TipoDireccion whereNombreTipo($value)
 */
	class TipoDireccion extends \Eloquent {}
}

namespace App\Models{
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
 */
	class TipoDocumentoIdentidad extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Usuario extends \Eloquent {}
}

