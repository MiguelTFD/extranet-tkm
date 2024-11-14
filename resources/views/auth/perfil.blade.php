@extends('layouts.base')

@section('content')

<div class="container-fluid">
    <div class="row">
        @include('components.opcionesUsuario')
        @include('components.perfilUsuario')
    </div>
</div>
@endsection
