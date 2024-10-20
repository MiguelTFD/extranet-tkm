{{-- resources/views/pages/home.blade.php --}}

<p>Hola, {{ $user->nombre }}</p>
@extends('layouts.base')

@section('content')
    <!-- Aquí se muestra el nombre del usuario -->
    @component('components.carrouselBanner')
    @endcomponent
    @component('components.topfeatures')
    @endcomponent
    @component('components.categoriesProducts')
    @endcomponent
    @component('components.realStats')
    @endcomponent
    @component('components.featuresStats')
    @endcomponent
    @component('components.bestProducts')
    @endcomponent
    @component('components.services')
    @endcomponent
    @component('components.paymentsMethods')
    @endcomponent

@endsection

