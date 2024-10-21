<div class="container-xxl py-5" id="categoriesSection">
    <div class="container">
        <div class="titleCategories">
            <h1>Nuestros </br> Productos </h1>
            <img class="titUnder" src="{{ asset('images/titleunderline.png') }}">
        </div>
        <div class="catFigureCt">
            <form action="{{ route('filtrarProductos') }}" method="POST">
                @csrf
                <input type="hidden" name="idCategoria" value="1">
                <button type="submit" style="background: none; border: none; cursor: pointer;">
                    <figure>
                        <div class="imgMD">
                        </div>
                        <h2>Musgo Deshidratado</h2>
                    </figure>
                </button>
            </form>

            <form action="{{ route('filtrarProductos') }}" method="POST">
                @csrf
                <input type="hidden" name="idCategoria" value="2">
                <button type="submit" style="background: none; border: none; cursor: pointer;">
                    <figure>
                        <div class="imgMV">
                        </div>
                        <h2>Musgo Vivo</h2>
                    </figure>
                </button>
            </form>
        </div>
    </div>
</div>


