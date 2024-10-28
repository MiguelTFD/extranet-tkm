@extends('layouts.base')

@include('partials.msg')
<style>

    #navbarCollapse{
        display:none !important;
    }
    .footer-container{
        display:none !important;
    }
    .cart-content-layout{
        display:flex;
        justify-content: space-around;
        margin: 6em 0;
        min-height:100vh;
        flex-flow:row wrap;
    }
    .item-cart-product{
       display:flex;
       justify-content: space-around;
        width:70%;
        background:#EEEEEE;
        border-radius:15px;
        margin: 0 auto;
        align-items: center;
        padding: 0.6em;
    }
    .item-cart-product-name_description{
        width: 30%;
        font-size: 0.7em;
    }
    .cart-content-items{
        flex-grow:2;
    }
    .cart-content-summary-subtotal{
        display:flex;
        justify-content:space-between;
    }
    .cart-content-summary-total{
        display:flex;
        justify-content:space-between;
    }
    .cart-content-summary{
        flex-grow:1;
    }
    .cart-content-items-list{
        display: flex;
        flex-direction: column;
        gap: 3em;
    }
    .item-cart-product-count_image{
        display: flex;
        align-items: center;
    }
    .img-cart-tumb{
        border-radius:9px;
    }
    .qty-label *{
        margin:0px !important;
    
    }
    .qty-label{
        display:flex;
        flex-direction:column;
    }
    .product-quantity{
        margin:1em;
    }
    .cart-actions{
        display:flex;
        flex-direction:column;
        gap: 1em;
        margin: 1em 0;
        align-items:center;
    }
    .svg-cart-empty{
        width:20%;
        margin: 0 auto;
        fill: #b9b9b9;
    }
    .navbar-toggler{
        display:none !important;
    }
</style>
@section('content')
    <div class="cart-content-layout">
        <div class="cart-content-items">
            <h1 style="width:70%; margin:1em auto;">
                Carrito de Compra
            </h1>
        <div class="cart-content-items-list">
            @php
                $totalConDescuento = 0;
                $totalSinDescuento = 0;
            @endphp
            @if (Cart::count())
               @foreach(Cart::content() as $item)
                  <div class="item-cart-product">
                     <div class="item-cart-product-count_image">
                        {{--Aumentar cantidad--}}
                        <div class="product-quantity">
                            <div class="qty-label">
                                <form 
                                    action="{{route('increaseQuantity')}}"
                                    method="post"
                                >
                                    @csrf
                                    <input 
                                        type="hidden"
                                        name="rowId"
                                        value="{{$item->rowId}}"
                                    >
                                    <input
                                        class="btn"
                                        type="submit"
                                        name="btn"
                                        value="+"
                                    >
                                </form>
                                <p class="form-control text-center my-1">{{$item->qty}}</p>        
                                 <form
                                    action="{{route('decreaseQuantity')}}"
                                    method="post"
                                >
                                    @csrf
                                    <input
                                        type="hidden"
                                        name="rowId"
                                        value="{{$item->rowId}}"
                                    >
                                    <input
                                        class="btn"
                                        type="submit"
                                        name="btn"
                                        value="-"
                                    >
                                </form>       
                            </div>
                        </div>
                        <img 
                            src="{{asset('images/' . $item->options->imagenes) }}" 
                            alt="{{ $item->name }}" 
                            style="max-width: 100px; max-height: 100px;"
                            class="img-cart-tumb"
                        >
                     </div>
                     <div class="item-cart-product-name_description">
                        <p style="font-size:1.4em;font-weight:bold;">{{ $item->name }} 
                        <p>{{ $item->options->descripcion }} 
                     </div>
                     <div class="item-cart-product-pricesummary">
                        <h6>Total a pagar</h6>
                        <span class="current-price">
                          S/{{ number_format($item->qty * ($item->price - ($item->price * ($item->options->descuento / 100))), 2) }}
                        </span>
                        <span class="old-price">
                           S/{{ number_format($item->price * $item->qty, 2) }}
                        </span>
                     </div>
                     <div class="removeItemSection">
                        <form action="{{route('remove')}}"
                            method="post"
                        >
                        @csrf
                           <input 
                               type="hidden"
                               name="rowId"
                               value="{{$item->rowId}}"
                            >
                            <input
                                type="submit"
                                name="btn"
                                class="btn btn-danger btn-sm"
                                value="✕"
                            >
                        </form>
                     </div>
                     @php
                        $totalConDescuento += $item->qty * ($item->price - ($item->price * ($item->options->descuento / 100)));
                        $totalSinDescuento += $item->price * $item->qty;
                     @endphp
                  </div>
               @endforeach
            @else
               <a  style="text-align:center;" href="{{ route('productos') }}">
                  Agrega un producto
               </a>
               <?xml version="1.0" ?><svg class="svg-cart-empty" enable-background="new 0 0 64 64" id="Layer_1" version="1.1" viewBox="0 0 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M62.5141563,14.6933594C62.1342735,14.2529297,61.5815392,14,60.9999962,14h-8c-1.1044922,0-2,0.8955078-2,2   s0.8955078,2,2,2h5.6816406l-1.9258423,13H40.9999962c-1.1044922,0-2,0.8955078-2,2s0.8955078,2,2,2h15.163269l-0.888855,6   H20.6635704L15.966794,15.6357422C15.7910128,14.6879883,14.9643526,14,13.9999971,14h-11c-1.1044922,0-2,0.8955078-2,2   s0.8955079,2,2,2h9.3364258l4.6967764,25.3642578C17.2089806,44.3120117,18.0356407,45,18.9999962,45h38   c0.9912109,0,1.8330078-0.7260742,1.9785156-1.7070313l4-27C63.0634727,15.7177734,62.8940392,15.1337891,62.5141563,14.6933594z"/><path d="M26.9999962,49c-3.8598633,0-7,3.1401367-7,7s3.1401367,7,7,7s7-3.1401367,7-7S30.8598595,49,26.9999962,49z    M26.9999962,59c-1.6542969,0-3-1.3457031-3-3s1.3457031-3,3-3s3,1.3457031,3,3S28.6542931,59,26.9999962,59z"/><path d="M48.9999962,49c-3.8598633,0-7,3.1401367-7,7s3.1401367,7,7,7s7-3.1401367,7-7S52.8598595,49,48.9999962,49z    M48.9999962,59c-1.6542969,0-3-1.3457031-3-3s1.3457031-3,3-3s3,1.3457031,3,3S50.6542931,59,48.9999962,59z"/><path d="M30.9999962,16h2v2c0,1.1044922,0.8955078,2,2,2s2-0.8955078,2-2v-2h2c1.1044922,0,2-0.8955078,2-2s-0.8955078-2-2-2h-2v-2   c0-1.1044922-0.8955078-2-2-2s-2,0.8955078-2,2v2h-2c-1.1044922,0-2,0.8955078-2,2S29.895504,16,30.9999962,16z"/><path d="M34.9999962,27c7.168457,0,13-5.831543,13-13s-5.831543-13-13-13s-13,5.831543-13,13S27.8315392,27,34.9999962,27z    M34.9999962,5c4.9624023,0,9,4.0375977,9,9s-4.0375977,9-9,9s-9-4.0375977-9-9S30.0375938,5,34.9999962,5z"/></g></svg>
            @endif
        </div>
        </div>
        <div style="margin:0 3em;" class="cart-content-summary">
            <h1 style="margin:1em auto">Resumen</h1>
            <div class="cart-content-summary-layout">
                <div class="cart-content-summary-subtotal">
                    <span>Subtotal</span>
                    <span>
                    <span class="old-price">S/{{ number_format($totalSinDescuento, 2) }}</span>
                    </span>
                </div>
                <hr>
                <div class="cart-content-summary-total">
                    <span>Total</span>
                    <span>
                    <span class="current-price">S/{{ number_format($totalConDescuento, 2) }}</span>
                    </span>
                </div>
                <div class="cart-actions">
                    <button style="width:100%" class="btn btn-primary" type="submit">
                        Proceder a pagar
                    </button>
                    <a 
                        href="{{ route('productos') }}"
                    >
                        Seguir comprando
                    </a>
                    <a href="{{ route('clear') }}">
                        Vaciar carrito 
                    </a>
                </div>
            </div>
    </div>
@endsection

