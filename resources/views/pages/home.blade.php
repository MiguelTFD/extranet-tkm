{{-- resources/views/pages/home.blade.php --}}

@extends('layouts.base')

@section('content')

    @component('components.carrouselBanner')
    @endcomponent
    @component('components.topfeatures')
    @endcomponent

    @component('components.featuresStats')
    @endcomponent
    @component('components.paymentsMethods')
    @endcomponent

@endsection

