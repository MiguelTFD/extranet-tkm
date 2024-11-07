{{-- resources/views/components/catXprod.blade.php --}}
<style>
.catXprodCt {
    display: flex;
    flex-flow:row wrap;
    justify-content:space-around;
}
</style>


<div class="catXprodCt">
        @include('components.productCard', ['productos' => $productos])
</div>

