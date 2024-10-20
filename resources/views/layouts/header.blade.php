{{-- resources/views/layouts/header.blade.php --}}
@php
    $user = auth()->user();
@endphp
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <img class="tkmlogo" src="{{ asset('images/icon/TKMLogo.png')}}"/>
        <h1 id="lgD" class="m-0">The King Moss</h1>
    </a>
    <button
        type="button"
        class="navbar-toggler me-4"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse"
    >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a
                href="{{ route('about') }}"
                class="nav-item nav-link"
            >
                Nosotros
            </a>
            <a
                href="{{ route('productos') }}"
                class="nav-item nav-link"
            >

            </a>
            <a
                href="{{ url('/gallery') }}"
                class="nav-item nav-link"
            >
                Galeria
            </a>
            <a
                href="{{ route('contact') }}"
                class="nav-item nav-link"
            >
                Contáctenos
            </a>
        </div>
        @if($user)
            <p>Hola, {{ $user->name }}</p>  <!-- Aquí se muestra el nombre del usuario -->
            <a href="{{ route('logout') }}" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">
                Cerrar Sesión
                <i class="fa fa-arrow-right ms-3"></i>
            </a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">
                Iniciar Sesión
                <i class="fa fa-arrow-right ms-3"></i>
            </a>
        @endif
    </div>
</nav>

