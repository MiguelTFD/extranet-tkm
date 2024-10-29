<style>
.treeSpaces{
    display:flex;
    justify-content: space-between;
    flex-flow: row wrap;
    justify-content: center;
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
       @component('components.customListProducts')
       @endcomponent
    </div>
    <div class="cntew">
        <div class="cntew">
            <form action="{{ route('filtrarProductos') }}" method="POST">
                @csrf <!-- Token CSRF -->
                <input type="hidden" name="idCategoria" value="">
                <button class="addCar" type="submit" >
                    Ver todos los productos
                </button>
            </form>
        </div>

    </div>
</div>
