@extends('layouts.base')

@section('content')
<style>
#frm-ped{
width: 100%;
align-content: center;
display: flex;
justify-content: center;
}

    .wsp-1-2 , #btn-carrito{
        display:none !important;
    }
#iniciarSesionBtn{
    display:none !important;
}
.footer-container{
    display:none !important;
}

.content {
    padding: 20px;
}
.order-card {
    background-color: #EEEEEE;
    border-radius: 9px;
    padding: 40px;
    margin-bottom: 15px;
}
.order-details-btn {
    background-color: #b2a02a;
    color: #fff;
    font-weight: bold;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
}
.order-details-btn:hover {
    background-color: #a39224;
}
.dir-opt{
    display: flex;
    justify-content: space-evenly;
    width: 100%;
}
</style>
  

    <div class="container-fluid">
        <div class="row">
            @include('components.opcionesUsuario')
            <div style="background:white;" class="col-md-9 content">
                <div class="">
                @if ($pedidos->isNotEmpty())
                    @foreach ($pedidos as $pedido)
                    <div 
                        style="flex-flow: row wrap;"
                        class="order-card d-flex justify-content-between align-items-center"
                    >
                        <div
                            style="flex-flow: row wrap;"
                            class="dir-opt">
                            <p><strong>N° Orden Compra:</strong>
                                {{$pedido->idOrdenCompra}}</p>
                            <p><strong>Total a pagar:</strong>
                                {{$pedido->precioTotal}}</p>
                            <p><strong>Fecha:</strong>
                                {{$pedido->fechaOrdenCompra}}</p>
                            <p><strong>Estado:</strong>
                                {{$pedido->estadoOrdenCompra}}</p>
                        </div>
                        <form 
                            id="frm-ped" 
                            action="{{ route('getOrder') }}" 
                            method="POST"
                        >
                            @csrf
                            <input 
                                type="hidden" 
                                name="idOrdenCompra" 
                                value="{{$pedido->idOrdenCompra }}"
                            >
                            <button 
                                style="margin:0 auto" 
                                class="order-details-btn" 
                                type="submit"
                            >
                                Ver Detalles
                            </button>
                        </form>
                    </div>
                    @endforeach
                @else
                    <p>No hay pedidos disponibles.</p>
                @endif
                </div>
            </div>
        </div>
    </div>

@endsection
