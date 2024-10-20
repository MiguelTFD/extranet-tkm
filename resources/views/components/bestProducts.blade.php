<style>
.treeSpaces{
    display:flex;
    justify-content: space-between;
}
.cntew{
display:flex;
    justify-content: center;
    margin-top: 6em;
    margin-bottom: 6em;
}

</style>


<div class="container">
    <div class="titleCategories">
        <h1>Productos</br> Destacados </h1>
        <img class="titUnder"src="{{asset('images/titleunderline.png')}}" >
    </div>

    <div class="treeSpaces">
       @component('components.productCard')
       @endcomponent
       @component('components.productCard')
       @endcomponent
       @component('components.productCard')
       @endcomponent
    </div>
    <div class="cntew">
    <button class="addCar">
        Ver todos los productos
    </button>
    </div>
</div>
