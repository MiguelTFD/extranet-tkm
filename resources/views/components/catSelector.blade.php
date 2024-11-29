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
    @media(max-width:1200px){
        .selectorCate{
            text-align: center;
        }
        .ul-cat{
            margin-left: 0px !important;
            padding-left: 0px !important;
        }
        .selectorCate .ul-cat{
            display:flex;
            justify-content:space-around;
        }
        .selectorCate .catList:before {
            content: "";
        }
    }

    @media(max-width:943px){
        .selectorCate{
            text-align: center;
        }
        .ul-cat{
            margin-left: 0px !important;
            padding-left: 0px !important;
        }
        .selectorCate .ul-cat{
            display:flex;
            flex-direction:column;
        }
        .selectorCate .catList:before {
            content: "";
        }
    }

    .selectorCate .catList {
        cursor: pointer;
    }
</style>

<div 
    class="selectorCate"
>
    <h1>
        Categorías
    </h1>
    <ul
        id="categories-container"
        class="ul-cat"
    >
        <li>
            <form action="{{ route('filtrarProductos') }}" method="POST">
                @csrf <!-- Token CSRF -->
                <input type="hidden" name="idCategoria" value="">
                <button 
                    class="catList" 
                    type="submit" 
                    style="background: none; border: none; cursor: pointer;"
                >
                    <span  style="color:#C4B400;">  Todos </span>
                </button>
            </form>
        </li>
        @foreach($categorias as $categoria)
        <li>
            <form 
                action="{{ route('filtrarProductos') }}" 
                method="POST"
            >
            @csrf 
                <input 
                    type="hidden" 
                    name="idCategoria" 
                    value="{{ $categoria->idCategoria }}"
                >
                    <button 
                        class="catList" 
                        type="submit" 
                        style="background: none; border: none;"
                    >
                    <span 
                        style="color:#C4B400;"
                    > 
                        {{ $categoria->nombreCategoria }} 
                    </span>
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
</div>



