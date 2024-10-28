{{-- resources/views/components/productCard.blade.php --}}

<style>
.productCardMain {
    display:flex;
    flex-direction:column;
    min-width: 330px;
}

@media (max-width: 400px) {
    .productCardMain{
    min-width:290px;
    }
}

.productCardImage {
    max-width:300px;
    max-height:300px;
    display: block;
    margin: 0px auto;
    border-radius:15px;
}

.nombreItem {
    text-align: center;
}

.preciosItems {
    display: flex;
    justify-content: space-evenly;
}

.btnItems {
    display: flex;
    justify-content: space-evenly;
}

.productCardDesc {
    width: 50px;
    margin: 3px;
    background: #C4B400;
    color: white;
    border-radius: 100%;
    height:50px;
    position:relative;
    top:35;
}

.productCardDesc p {
    padding: 10px;
}

.addCar {
    all: unset;
    display: inline-block;
    cursor: pointer;
    padding: 10px;
    margin: 0;
    border: none;
    border-radius: 30px;
    background: #C4B400;
    color: #FFFFFF;
}

.viewMore {
    all: unset;
    border-radius: 30px;
    background: #C4B400;
    display: inline-block;
    cursor: pointer;
    padding: 5px;
    margin: 0;
    border: none;
    background: #2D2D2E;
    color: #FFFFFF;
}
.viewMore:hover{
    color:#FFFFFF;
}

.preciosItems {
    margin: 7px 0px;
    align-items: center;
}
.offert-price{
    color: #C4B400;
    font-size: 25px;
}
.old-price{
    text-decoration: line-through;
    color: #a0a0a0;
}
.product-name{
    font-family: "Jost", sans-serif;
    font-size:20px;
    font-weight:550;
}
</style>

@php
    $productos = collect(session('productos', []));
@endphp

@if ($productos->isNotEmpty())
    @foreach ($productos as $producto)
        <div class="productCardMain">
            <div class="productCardDesc">
                <p>{{ intval($producto->descuento) }}%</p>
            </div>
            
            @php
                $precioActual = $producto->precioUnitario - 
                ($producto->precioUnitario * ($producto->descuento / 100));
                
                $precioAntes = $producto->precioUnitario;
                
                // Obtener la primera imagen
                $imagenUrl = $producto->imagenes->first() ?
                $producto->imagenes->first()->urlImagenProducto :
                asset('images/bf5k.png'); // Imagen por defecto si no hay
            @endphp
            
            <figure>
                <img 
                    class="productCardImage" 
                    src="{{ asset('images/' . $imagenUrl) }}" 
                    alt="{{ $producto->nombreProducto }}"
                >
                <figcaption 
                    class="nombreItem"
                >
                    <p 
                        class="product-name"
                    >
                        {{$producto->nombreProducto }}
                    </p>
                </figcaption>
                <figcaption 
                    class="preciosItems"
                >
                    <strong>
                        <p 
                            class="offert-price"
                        >
                            S/.{{ number_format($precioActual, 2) }}
                        </p>
                    </strong>
                    <p 
                        class="old-price"
                    >
                        S/.{{ number_format($precioAntes, 2) }}
                    </p>
                </figcaption>
                <div 
                    class="btnItems"
                >
                    <div 
                        class="cart-add"
                    >
                        <form  
                            action="{{route('add')}}" 
                            method="post"
                        >
                        @csrf
                            <input 
                                type="hidden" 
                                name="id" 
                                value="{{$producto->idProducto}}"
                            >
                            <button 
                                type="submit" 
                                class="addCar"
                            >
                                Agregar al carrito
                            </button>
                        </form>
                    </div>
                     <div 
                        class="cart-add"
                    >
                        <button class="viewMore">
                            <a 
                                href="{{ route('productosDetalle', 
                                $producto->idProducto) }}" 
                                class="viewMore"
                            >
                                Ver Más
                            </a>
                        </button>
                    </div>
                </div>
            </figure>
        </div>
    @endforeach
@else
    <p>No hay productos disponibles.</p>
@endif

