@extends('layouts.base')

@section('content')
<style>
.qr-modal {
    display: none; /* Inicialmente oculto */
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Fondo difuso */
    overflow: auto;
    padding-top: 60px;
}

.qr-modal-content {
    background-color: white;
    margin: 6em auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 400px;
    position: relative;
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 30px;
    color: #aaa;
    cursor: pointer;
}

.close-btn:hover,
.close-btn:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

#qrImage {
    width: 100%;
    height: auto;
}


.footer-container{
    display:none !important;
}
#iniciarSesionBtn{
    display:none !important;
}
.tb-dp{
    background:#E9E9E9;
    padding:3em;
    border-radius:9px;
}
thead tr{
    border-bottom:2px solid #d2d2d2 !important;
}
.tb-dp *{
    padding:1.3em !important;
}

.mb-2{
    margin-bottom: 2.5rem !important;
}
.card-body{
    background: #f0f0ef;
}
.content{
    background-color: white;
    border: unset;
}
.card{
    border:unset;
}
@media (max-width: 500px) {
    .rdp{
        width: 100%;
        text-align: unset !important;
    }
}


    .wsp-1-2 , #btn-carrito{
        display:none !important;
    }
</style>

<div class="container-fluid">
    <div class="row">
        @include('components.opcionesUsuario')
        <div class="col-md-9 content">
            <div class="alert alert-warning align-items-center" role="alert">
                <i class="bi bi-info-circle-fill me-2"></i>
                <p> Recuerda enviar tu <b>Número de pedido</b> o tu <b> nombre completo</b> al momento de hacer el pago en <b>Yape</b> o por <b>BCP</b>

                </p>
            </div>
<div class="alert alert-info align-items-center" role="alert">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                <p> Envia la <b> Constancia de tu pago </b>
                                    a nuestro <a
                                        href="https://api.whatsapp.com/send?phone=51983929015" target="_blank">Whatsapp</a> o a
                                    nuestro correo electronico <a 
                                        href="mailto:henry.management@thekingmoss.com" target="_blank" >
                                       henry.management@thekingmoss.com
                                       </a>
                                </p>
                              </div>
    <div>
        @php
            $carnivora = 0;
        @endphp
        @foreach($datosOrdenCompra['detalles'] as $detalle)
            @if($detalle['idCategoria']==1)
                @php
                $carnivora += 1; 
            @endphp
            @endif
        @endforeach
        @if($carnivora >0)
            <div style="flex-direction: column" class="d-flex align-items-center justify-content-center">
        <h3>Manual para el cuidado de plantas carnivoras: </h3>
            <a style="max-width: 300px;"
                href="https://drive.google.com/file/d/1Vq6C3SlNoL7OddajESp5w6FgIY44BREW/view?usp=sharing"
                target="_blank">
                <img style="width: 100%" src="{{ asset('images/manualCarnivoras.png') }}"
                >
            </a>
            </div>
            <hr>
        @endif

    </div>

 <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Detalles de la Orden</h5>
                <div class="row mb-2">
                    <div class="col-6"><strong>N° Orden Compra</strong></div>
                    <div class="col-6 text-end rdp">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $datosOrdenCompra['idOrdenCompra'] }}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Total a pagar</strong></div>
                    <div class="col-6 text-end rdp">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        S/{{ $datosOrdenCompra['precioTotal'] }}
                        <p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Fecha</strong></div>
                    <div class="col-6 text-end rdp">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $datosOrdenCompra['fechaOrdenCompra'] }}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Información de la compra</strong></div>
                    <div class="col-6 text-end rdp">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $datosOrdenCompra['informacionOrdenCompra'] }}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Instrucción de entrega</strong></div>
                    <div class="col-6 text-end rdp">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $datosOrdenCompra['instruccionEntrega'] }}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Tipo de entrega</strong></div>
                    <div class="col-6 text-end rdp">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $datosOrdenCompra['tipoEntrega'] }}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Localidad</strong></div>
                    <div class="col-6 text-end rdp">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $datosOrdenCompra['direccion']}}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Agencia</strong></div>
                    <div class="col-6 text-end rdp">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $datosOrdenCompra['agencia']}}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Sede de Agencia</strong></div>
                    <div class="col-6 text-end rdp">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $datosOrdenCompra['sedeAgencia']}}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Método de pago</strong></div>
                    <div class="col-6 text-end rdp">
                        <p id="pagoElegido">
                            {{$datosOrdenCompra['metodoPago']}}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Detalles para el pago</strong></div>
                    <div id="opcionDePago" class=" col-6 text-end rdp">

                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Estado</strong></div>
                    <div class="col-6 text-end rdp">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $datosOrdenCompra['estadoOrdenCompra'] }}
                        </p>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table tb-dp">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th class="text-end">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($datosOrdenCompra['detalles'] as $detalle)
                            <tr>
                                <td>
                                    {{ $detalle['nombreProducto'] }}
                                </td>
                                <td 
                                    class="text-end"
                                >
                                    {{ $detalle['cantidad'] }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-4">
                    <form 
                        action="{{ route('generatePdf') }}" 
                        method="POST"
                    >
                        @csrf
                        <input 
                            type="hidden" 
                            name="idOrdenCompra" 
                            value="{{ $datosOrdenCompra['idOrdenCompra'] }}"
                        >
                        <button 
                            style="margin:0 auto"
                            class="btn btn-primary order-details-btn" 
                            type="submit"
                        >
                            Imprimir pedido
                        </button>
                        </form>
                </div>
            </div>
        </div>
    </div>
        <a href="{{ url()->previous() }}">Volver</a>
        </div>
    </div>
</div>
<script src="{{asset('js/showPayOption.js')}}"></script>
@endsection
