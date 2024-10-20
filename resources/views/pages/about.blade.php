@extends('layouts.base')

@section('content')
<!-- Page Header Start -->
<div 
    class="container-fluid page-header page-about py-5 mb-5 wow fadeIn" 
    data-wow-delay="0.1s"
>
    <div 
        class="container text-center py-5"
    >
        <h1 
            class="display-3 text-white mb-4 animated slideInDown"
        >
            Sobre Nosotros
        </h1>
        <nav 
            aria-label="breadcrumb animated slideInDown"
        >
            <ol 
                class="breadcrumb justify-content-center mb-0"
            >
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item"><a href="#">Páginas</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Sobre Nosotros
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
@component('components.aboutSection')
@endcomponent
@component('components.featuresStats')
@endcomponent
@endsection
