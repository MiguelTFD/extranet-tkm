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


@if ($productos->isNotEmpty())
    @foreach ($productos as $producto)
        <div class="productCardMain">
            @if($producto->descuento > 0)
            <div class="productCardDesc">
                <p>{{ intval($producto->descuento) }}%</p>
            </div>
            @else   
            <div style="background:white;color:white" class="productCardDesc">
                <p>.</p>
            </div>
            @endif
            
            @php
                $precioActual = $producto->precioUnitario - 
                ($producto->precioUnitario * ($producto->descuento / 100));
                
                $precioAntes = $producto->precioUnitario;
                
                // Obtener la primera imagen
                $imagenUrl = $producto->imagenes->first() ?
                $producto->imagenes->first()->urlImagenProducto :
                asset('images/bf5k.png'); // Imagen por defecto si no hay
            @endphp
                <a
                    href="{{ route('productosDetalle',
                        $producto->idProducto) }}"
                >
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
                </a>
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
                    @if($producto->descuento > 0)
                    <p 
                        class="old-price"
                    >
                        S/.{{ number_format($precioAntes, 2) }}
                    </p>
                @endif
                </figcaption>
                <div 
                    class="btnItems"
                >
                    <div class="cart-add">
                        <form id="addToCartForm" action="{{ route('add') }}" method="POST">
                            @csrf
                            <input
                                    type="hidden"
                                    name="id"
                                    value="{{$producto->idProducto}}"
                            >
                            <button
                                    type="button"
                                    class="addCar"
                                    onclick="addToCart(this)"
                            >
                                Agregar al carrito
                            </button>
                        </form>
                    </div>
                </div>
            </figure>
        </div>
    @endforeach
@else
    <p>No hay productos disponibles.</p>
@endif

<script>
    function addToCart(button) {
        const csrfToken = 
            document.querySelector('meta[name="csrf-token"]').content;
        const form = button.closest('form');
        const formData = new FormData(form);
        
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json', 
            },
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json(); 
            })
            .then(data => {
                if (data.success) {
                    
                    const messageDiv = document.createElement('div');
                    messageDiv.className = 'alert alert-success';
                    messageDiv.textContent = data.message;
                    document.body.appendChild(messageDiv);
                   
                    setTimeout(() => {
                        messageDiv.remove();
                    }, 3000);
                } else {
                    alert('Hubo un error al agregar el producto.');
                }
            })
            .catch(error => console.error('Error:', error));
    }

</script>
