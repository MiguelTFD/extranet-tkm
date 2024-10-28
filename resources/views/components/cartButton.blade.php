<style>
#cart-count-number{
    border-radius:10px;
    position: absolute;
    top: -9px;
    left: -10px;    
}

</style>

<a
    class="btn"
    style="display:flex;"
    id="btn-carrito"
    href="{{route('checkout')}}"
>
<span
    id="cart-count-number"
    class="badge bg-danger"
>
    {{\Cart::count()}}
</span>

    <img 
        class="icon-cart"
        src="{{ asset('images/icon/shopping.svg')}}" 
        alt="carrito" 
    >
</a>
