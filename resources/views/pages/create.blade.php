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


    {{-- Formulario para crear el usuario --}}
    <form action="{{ route('store') }}" method="POST">
        @csrf  <!-- Asegúrate de incluir este token de CSRF -->
        {{-- Datos del Usuario --}}
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

        {{-- Documento de Identidad --}}
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

        {{-- Dirección --}}
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
            <label for="direccionExacta">Dirección Exacta</label>
            <input type="text" name="direccionExacta" class="form-control" id="direccionExacta" value="{{ old('direccionExacta') }}" required>
        </div>

        <div class="form-group">
            <label for="referencia">Referencia</label>
            <input type="text" name="referencia" class="form-control" id="referencia" value="{{ old('referencia') }}" required>
        </div>

        <div class="form-group">
            <label for="idTipoDireccion">Tipo de Dirección</label>
            <select name="idTipoDireccion" class="form-control" id="idTipoDireccion" required>
                <option value="">Seleccione el tipo de dirección</option>
                @foreach($tiposDireccion as $tipoDireccion)
                    <option value="{{ $tipoDireccion->idTipoDireccion }}">{{ $tipoDireccion->nombreTipo }}</option>
                @endforeach
            </select>
        </div>

        {{-- Botón de envío --}}
        <button type="submit" class="btn btn-primary">Registrar Usuario</button>
    </form>
</div>
@endsection

