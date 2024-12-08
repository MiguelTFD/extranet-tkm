
@extends('layouts.base')

@section('content')
<style>
@media (max-width: 1200px) {

    .prodSectionCt{
        display:flex;
        flex-direction:column;
    }
}

@media (max-width: 400px) {

    .prodSectionCt{
        display:flex;
        flex-direction:column;
    }
}


</style>

@include('components.bannerPageInfo')

<div class="prodSectionCt">
    @include('components.catSelector')
    @include('components.catXprod')
</div>

<script>
function increment() {
    var cantidad = document.getElementById("cantidad");
    cantidad.stepUp();
}

function decrement() {
    var cantidad = document.getElementById("cantidad");
    cantidad.stepDown();
}
</script>

<script>

</script>


@endsection
