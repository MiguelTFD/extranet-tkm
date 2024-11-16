@extends('layouts.base')
@section('content')
<style>
.footer-container{
    display:none !important;
}
#iniciarSesionBtn{
    display:none !important;
}
</style>

<div class="container-fluid">
    <div class="row">
        @include('components.opcionesUsuario')
        @include('components.perfilUsuario')
    </div>
</div>
@endsection
