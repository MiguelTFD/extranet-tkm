<style>
    ul {
        list-style-type: none;
    }

    .selectorCate .catList:before {
        position: relative;
        content: "•";
        left: -10px;
        display: inline-block;
        color: #c4b400;
        font-size: 40px;
        vertical-align: middle;
        top: -2px;
    }

    .selectorCate .catList {
        cursor: pointer;
    }
</style>
@php
    // Obtener las categorías desde la sesión
    $categorias = collect(session('categorias', []));
@endphp

<div class="selectorCate">
    <h1>Categorías</h1>
    <ul>
        <!-- Opción para mostrar todos los productos -->
        <li>
            <form action="{{ route('filtrarProductos') }}" method="POST">
                @csrf <!-- Token CSRF -->
                <input type="hidden" name="idCategoria" value="">
                <button class="catList" type="submit" style="background: none; border: none; cursor: pointer;">
                    Todos
                </button>
            </form>
        </li>

        @foreach($categorias as $categoria)
            <li>
                <form action="{{ route('filtrarProductos') }}" method="POST">
                    @csrf <!-- Token CSRF -->
                    <input type="hidden" name="idCategoria" value="{{ $categoria->idCategoria }}">
                    <button class="catList" type="submit" style="background: none; border: none; cursor: pointer;">
                        {{ $categoria->nombreCategoria }}
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
</div>



