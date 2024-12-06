@extends('layouts.base')
@section('content')
<div class="container">
    <h2>Registrar Nuevo Usuario</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre') }}" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" class="form-control" id="apellido" value="{{ old('apellido') }}" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" class="form-control" id="telefono" value="{{ old('telefono') }}" required>
        </div>

        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" class="form-control" id="correo" value="{{ old('correo') }}" required>
        </div>

        <div class="form-group">
            <label for="numeroDocumentoIdentidad">Número de Documento de Identidad</label>
            <input type="text" name="numeroDocumentoIdentidad" class="form-control" id="numeroDocumentoIdentidad" value="{{ old('numeroDocumentoIdentidad') }}" required>
        </div>

        <div class="form-group">
            <label for="idTipoDocumentoIdentidad">Tipo de Documento de Identidad</label>
            <select name="idTipoDocumentoIdentidad" class="form-control" id="idTipoDocumentoIdentidad" required>
                <option value="">Seleccione el tipo de documento</option>
                @foreach($tiposDocumento as $tipo)
                    <option value="{{ $tipo->idTipoDocumentoIdentidad }}">{{ $tipo->nombreTipoDocumentoIdentidad }}</option>
                @endforeach
            </select>
        </div>

        <h4>Dirección</h4>

        <div class="form-group">
            <label for="idDistrito">Distrito</label>
            <select name="idDistrito" class="form-control" id="idDistrito" required>
                <option value="">Seleccione el distrito</option>
                @foreach($distritos as $distrito)
                    <option value="{{ $distrito->idDistrito }}">{{ $distrito->nombreDistrito }}</option>
                @endforeach
            </select>
        </div>

            <div class="form-group">
                <label for="agencia">Agencia de envio</label>
                <input type="text" name="agencia" 
                class="form-control" 
                id="agencia" 
                value="{{ old('agencia') }}" 
                placeholder="Shalom, Olva, Etc." required>
                <p class="info-icon" style="color:#949494;font-size:0.9em;text-align:left; "> Usaremos esta agencia para proceder con el envio de tu compra</p>
        </div>
        <div class="mb-3">
            <label 
                for="sedeAgencia"
            >
                Agencia de envio
            </label>
            <input 
                type="text" 
                name="sedeAgencia" 
                class="form-control" 
                id="sedeAgencia" 
                value="{{ old('sedeAgencia') }}" 
                placeholder="Ingresa la sede o direccion
                de tu agencia elegida." 
                required
            >
            <p 
                class="info-icon" 
                style="color:#949494;font-size:0.9em;text-align:left; "
            >
                Esta direccion sera util para enviarte 
                tu pedido lo mas cerca a tu ubicacion
            </p>
        </div>

        
        <button type="submit" class="btn btn-primary">Registrar Usuario</button>
    </form>
</div>
@endsection

