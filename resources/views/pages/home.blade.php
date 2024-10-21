{{-- resources/views/pages/home.blade.php --}}

@extends('layouts.base')

@section('content')

    @component('components.carrouselBanner')
    @endcomponent
    @component('components.topfeatures')
    @endcomponent
    @component('components.categoriesProducts')
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

