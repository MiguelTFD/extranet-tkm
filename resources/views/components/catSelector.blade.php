<style>
    ul {
        list-style-type: none;
    }

    .selectorCate li:before {
        position: relative;
        content: "•";
        left: -10px;
        display: inline-block;
        color: #c4b400;
        font-size: 40px;
        vertical-align: middle;
        top: -2px;
    }

    .selectorCate li {
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
            <form action="{{ route('productos') }}" method="GET">
                <input type="hidden" name="idCategoria" value="">
                <button type="submit" style="background: none; border: none; cursor: pointer;">
                    Todos
                </button>
            </form>
        </li>

        <!-- Listar las categorías desde la base de datos -->
        @foreach($categorias as $categoria)
            <li>
                <form action="{{ route('productos') }}" method="GET">
                    <input type="hidden" name="idCategoria" value="{{ $categoria->idCategoria }}">
                    <button type="submit" style="background: none; border: none; cursor: pointer;">
                        {{ $categoria->nombreCategoria }}
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
</div>

