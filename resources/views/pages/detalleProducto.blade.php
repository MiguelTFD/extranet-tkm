
@extends('layouts.base')
@section('content')
<style>


.container-lite{
    width:100%;
    margin-top: 6em;
}
.cntew{
display:flex;
    justify-content: center;
    margin-top: 6em;
    margin-bottom: 6em;
}

@media(max-width:500px){
}
.prodSectionCt{
    display:grid;
    grid-template-columns:25% 75%;
    width: 70%;
    margin: 0 auto;
    min-height:100vh;
}

@media (max-width: 1200px) {

    .prodSectionCt{
        display:flex;
        flex-direction:column;
    }
}
@media (max-width: 1000px) {

    .product-info{
        text-align: center;
        align-items: center;
    }
}

@media (max-width: 600px) {

    .prodSectionCt{
        display:flex;
        flex-direction:column;
        width:100%;
    }
    .product-info{
        text-align: center;
        align-items: center;
    }
}


.product-details-container {
    display: flex;
    padding: 20px;
    margin: 0 auto;
    width:100%;
    flex-flow:row wrap;
    justify-content: space-evenly;
}

.product-image .details-img-product{
    max-width: 350px;
    height: auto;
    border-radius: 10px;
    object-fit: cover;
}

.product-info {
    display: flex;
    flex-direction: column;
    padding-left: 20px;
    max-width: 350px;
}

.product-info h1 {
    font-size: 24px;
    margin-bottom: 10px;
}

.product-discount {
    width:fit-content;
    background-color: #7B311E;
    color: white;
    padding: 5px 10px;
    border-radius: 30px;
    display: inline-block;
    margin-bottom: 10px;
}
.product-discount p{
    margin:0 !important;
    padding:5px;
    font-family:"Jost",sans-serif !important;
}
.product-prices {
    margin-top: 15px;
}

.current-price {
    font-size: 24px;
    color: #929302;
    font-weight: bold;
    margin-right: 10px;
}

.old-price {
    font-size: 16px;
    text-decoration: line-through;
    color: #d3d3d3;
}

.product-quantity {
    display: flex;
    align-items: left;
    margin: 15px 0;
    flex-direction:column;
}

.product-quantity label {
    margin-right: 10px;
    font-weight: bold;
}

.quantity-btn {
    background-color: #e0e0e0;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}

.quantity-btn:hover {
    background-color: #d0d0d0;
}

#quantity {
    width: 40px;
    text-align: center;
    margin: 0 5px;
}

.add-to-cart-btn {
    background-color: #C4B400;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    border-radius: 30px;
    color:white;
}

.add-to-cart-btn:hover {
    background-color: #D7C500;
}
input[type="number"] {
    -moz-appearance: textfield; /* Ocultar las flechas en Firefox */
}

input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none; /* Ocultar las flechas en Chrome */
}
.input-group{
width: 100px !important;
}
</style>

<div 
    class="container-fluid page-header page-products py-5 mb-5 wow fadeIn" 
    data-wow-delay="0.1s"
>
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">
           Productos
        </h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                   <a href="#">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                   <a href="#">Páginas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Productos
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="prodSectionCt">
    {{--agregar las caegorias--}}
    @include('components.catSelector',['categorias'=>$categorias])

    <div class="product-details-container">
    <div class="product-image">
@if ($producto->imagenes->isNotEmpty())
            <img class="details-img-product" src="{{ asset('images/' . $producto->imagenes->first()->urlImagenProducto) }}" alt="{{ $producto->nombreProducto }}">
        @else
            <img class="details-img-product" src="{{ asset('images/about.webp') }}" alt="Imagen por defecto">
        @endif
    </div>

    @php
        $precioActual = $producto->precioUnitario - ($producto->precioUnitario * ($producto->descuento / 100));
    @endphp

    <div class="product-info">
        <h1 style="color:#2D2D2E;margin-bottom:1em;">{{ $producto->nombreProducto }}</h1>
        @if($producto->descuento > 0)
        <div class="product-discount">
            <p>{{ intval($producto->descuento) }}% descuento</p>
        </div>
        @endif
       
        <p>
            <strong>Categoría:</strong>
            {{ $producto->categoria->nombreCategoria }}
        </p>
        @if($producto->descripcion)
        <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
        @endif
        @if($producto->tamanio)
        <p><strong>Medidas:</strong> {{$producto->tamanio}}</p>
        @endif
        
        <div class="product-prices">
            <span class="current-price">S/{{number_format($precioActual,2)}}</span> 
          @if($producto->descuento > 0)
            <span class="old-price">S/{{ number_format($producto->precioUnitario, 2) }}</span>
           @endif
        </div>

        <div class="product-quantity">
            <label style="color:#C4B400" for="cantidad">Cantidad</label>
            <div class="d-flex">
                <button class="btn " type="button" onclick="decrement()">-</button>
                <input id="cantidad"
                    type="number"
                    class="form-control text-center my-1"
                    name="cantidad"
                    value="1"
                    min="1"
                    step="1"
                    style="width: 40px;"
                >
                <button class="btn " type="button" onclick="increment()">+</button>
                </div>
        </div>
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
                class="add-to-cart-btn"
            >
                Agregar al carrito
            </button>
        </form>
    </div>

    <div style="margin-top:9em" class="catXprodCt">
        <div class="titleCategories">
            <h3 >Productos relacionados</h3>
        </div>
        <div class="treeSpaces">
        @if ($productosRelacionados->isNotEmpty())
                @foreach ($productosRelacionados as $relacionado)
                    <div class="productCardMain">
                        
                        @if($relacionado->descuento > 0)
                        <div class="productCardDesc">
                            <p>{{ intval($relacionado->descuento) }}%</p>
                        </div>
                        @else   
                        <div style="background:white;color:white" class="productCardDesc">
                            <p>.</p>
                        </div>
                        @endif
                        
                        @php
                            $precioActual = $relacionado->precioUnitario - 
                            ($relacionado->precioUnitario * ($relacionado->descuento / 100));
                            
                            $precioAntes = $relacionado->precioUnitario;
                            
                            $imagenUrl = $relacionado->imagenes->first() 
                                ? $relacionado->imagenes->first()->urlImagenProducto 
                                : asset('images/bf5k.png'); 
                        @endphp
                        
                        <figure>
                            <img 
                                class="productCardImage" 
                                src="{{ asset('images/' . $imagenUrl) }}" 
                                alt="{{ $relacionado->nombreProducto }}"
                            >
                            <figcaption class="nombreItem">
                                <p class="product-name">
                                    {{ $relacionado->nombreProducto }}
                                </p>
                            </figcaption>
                            <figcaption class="preciosItems">
                                <strong>
                                    <p class="offert-price">
                                        S/.{{ number_format($precioActual, 2) }}
                                    </p>
                                </strong>
                                @if($relacionado->descuento > 0)
                                <p class="old-price">
                                    S/.{{ number_format($precioAntes, 2) }}
                                </p>
                                @endif
                            </figcaption>
                            <div class="btnItems">
                                <div class="cart-add">
                                    <form action="{{ route('add') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $relacionado->idProducto }}">
                                        <button type="submit" class="addCar">Agregar al carrito</button>
                                    </form>
                                </div>
                                <div class="cart-add">
                                    <button class="viewMore">
                                        <a href="{{ route('productosDetalle', $relacionado->idProducto) }}" class="viewMore">
                                            Ver Más
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </figure>
                    </div>
                @endforeach
            @else
                <p>No hay productos relacionados en esta categoría.</p>
            @endif    
        </div>
    </div>
</div>
</div>


    
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


@endsection
