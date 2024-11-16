@extends('layouts.base')

@section('content')
<style>
.formaPago-layout{
    display:none;
}
    @media(max-width:480px){
        .pay-img-max{
        display:none; 
        }
        .formaPago-layout *{
            margin:12px 0;
        }
    }
    .pay-img-max{
        width:60px;
    }
    .lft{
        border-right:2px solid #DCDCDC;
    }
    .opt-ct{
        border-bottom: 2px dashed #DCDCDC;
    }
    .current-price {
    font-size: unset !important;
    color: #929302;
    font-weight: bold;
    }
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
    .item-cart-product-count_imagev{
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
    .hidden-product-name{
        display:none;
    }
    @media(max-width:900px){
        .ima{
            display:none;
        }
        .descripcion-item{
            display:none;
        }
        .hidden-product-name{
            display:flex;
            width:100%;
            justify-content:space-between;
        }
        .item-cart-product{
            flex-direction: column !important;
        }
        .name-item-product{
            display:none;
        }
        .cart-content-summary{
            flex-grow:0;
            width:50%;
        }
        .a{
            display:none !important;
        }
        .cart-content-items{
            width:60%;
            flex-grow:0;
        }
        .item-cart-product-count_imagev{
        }
        .qty-label{
            flex-direction:row;
        }
        .cart-content-summary{
            order:1;
        }
        .cart-content-items {
            order: 2;
        }
        .hidden-product-image{
            display:flex !important;
            justify-content: center;
        }
        div.item-cart-product:nth-child(1) > div:nth-child(2) > div:nth-child(4) > h6:nth-child(1) {
            text-align: center;
        }
        .imb{
            width:80%  !important;
            max-width: unset !important;
            max-height: unset !important;
            height: 80% !important;
        }
    }
    .null-div{
        display:contents;
    }
    .hidden-product-image{
        display:none;
    }
    @media(max-width:672px){
        .cart-content-items {
            width:90% !important;
            flex-grow:0;
        }
        .cart-content-summary {
            flex-grow:0;
            width:65%;
        }
    }
    @media(max-width:450px){
        .item-cart-product {
            width:90% !important;
        }
        .cart-content-summary {
            width:90% !important;
        }
        button.btn {
            padding: 1.4em;
            font-size: 1.2em;
        }
        .img-cart-tumb.imb{
            max-width: unset !important;
            max-height: unset !important;
            width:75% !important;
            height:75% !important;
        }
    }

    .address-card {
        width:100%;
        display: flex;
        align-items: center;
        background: #f0f0f0;
        border-radius: 15px;
        padding: 15px;
        margin: 10px 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .icon {
        font-size: 2em;
        color: #ccc;
        margin-right: 15px;
    }

      .address-details {
         flex-grow: 1;
         text-align: left;
      }

      .address-details p {
         margin: 0;
         color: #777;
      }

      .address-details p:nth-child(1) {
         color: #b0b200;
         font-weight: bold;
      }

      .radio-button {
         width: 20px;
         height: 20px;
         border: 2px solid #ccc;
         border-radius: 50%;
         display: flex;
         align-items: center;
         justify-content: center;
         margin-left: 15px;
         cursor: pointer;
      }

      .radio-button.active {
         border-color: #b0b200;
         background-color: #b0b200;
      }

      .radio-button.active::before {
         content: "";
         width: 10px;
         height: 10px;
         background-color: #fff;
         border-radius: 50%;
      }
    #btn-carrito{
        display:none !important;
    }
    .dsble{
        background:#EDEDED;
        pointer-events: none;
    }
    .btn-gotopay{
        width:90%;
        padding:1.6em 0;
    }
    @media (max-width: 900px) {
        .ima {
            display: inherit;
        }
        .name-item-product {
            display: inherit;
        }
    }
    @media(max-width:460px){
        .ima{
            display:none;
        }
        .item-cart-product-name_description {
            width: 45%;
            font-size: 0.8em;
        }
    }
      @media (max-width: 900px) {
          .item-cart-product-count_imagev {
              order: inherit !important;
          }
      }
    #orderPopUp {
        position: fixed;
        width: 100%;
        backdrop-filter: blur(5px);
        height: 100%;
        top: 0;
        z-index: 100000;
        display: none;
        justify-content: center;
        align-items: center;
    }
    .pago-max{
        width:100%;
    }
</style>
<div id="orderPopUp">
    <div class="popUpModal">
        <div class="">
            <div class="modal-content p-4">
                <h2 class="text-center mb-4">Agrega una nueva dirección de envío</h2>
                <form method="POST" action="{{ route('direccionNueva') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="pais" class="form-label">País</label>
                            <select id="pais" name="pais" class="form-select">
                                <option value="">Selecciona tu País</option>
                                @foreach($paises as $pais)
                                    <option value="{{ $pais->idPais }}">{{ $pais->nombrePais }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="departamento" class="form-label">Departamento</label>
                            <select id="departamento" name="departamento" class="form-select">
                                <option selected disabled>Selecciona tu Departamento</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="provincia" class="form-label">Provincia</label>
                            <select id="provincia" name="provincia" class="form-select">
                                <option value="">Selecciona tu Provincia</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="idDistrito" class="form-label">Distrito</label>
                            <select id="idDistrito" name="idDistrito" class="form-select">
                                <option value="">Selecciona tu Distrito</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="idTipoDireccion" class="form-label">Tipo de Dirección</label>
                            <select name="idTipoDireccion" class="form-select" id="idTipoDireccion" required>
                                <option value="">Seleccione el tipo de dirección</option>
                                @foreach($tiposDireccion as $tipoDireccion)
                                    <option value="{{ $tipoDireccion->idTipoDireccion }}">{{ $tipoDireccion->nombreTipo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="direccionExacta" class="form-label">Dirección Exacta</label>
                            <input type="text" name="direccionExacta" class="form-control" id="direccionExacta" value="{{ old('direccionExacta') }}" placeholder="Ingresa tu dirección exacta" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="referencia" class="form-label">Referencia</label>
                        <input type="text" name="referencia" class="form-control" id="referencia" value="{{ old('referencia') }}" placeholder="Danos una referencia de tu dirección" required>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" id="cerrarBtn" onclick="cerrarPopUp()" class="btn btn-secondary">Cancelar</button>
                        <button type="submit" class="btn btn-primary text-white">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <h1 style="text-align:center;">
        Registar Compra
    </h1>
    <form method="Post" action="{{ route('crearCompra') }}">
    @csrf    
        <div class="registrarCompra-layout">
                <div class="steps-content">
                    <div class="forma-entrega-layout">
                    <div class="forma-entrega-ct">
                        <div class="forma-et">
                            <h3>Elige tu forma de entrega</h3>
                            <p>Completado</p>
                        </div>
                        <div class="forma-et-lock">
                            <i style="color:var(--primary) ;font-size: 3em;" class="fa-solid fa-circle-check"></i>
                        </div>
                    </div>
                    </div>
                    <div id="fe-layout" class="formaEntrega-layout">
                    </div>
                    <div class="forma-pago-ct">
                        <div class="forma-pago">
                            <h3>Medio de pago</h3>
                            <p>----------- ---- ---- </p>
                        </div>
                        <div class="forma-pago-lock">
                            <i style="font-size: 3em;" class="fa-solid fa-lock"></i>
                        </div>
                    </div>
                    <div class="formaPago-layout">
                        <div class="pago-max card shadow-sm">
                            <div class="card-body">
                              <h3 class="card-title">Medio de Pago</h3>
                              <p class="card-text text-muted">Selecciona un medio de pago para continuar con tu compra</p>
                              <div class="alert alert-info d-flex align-items-center" role="alert">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                Recuerda efectuar el pago luego de generar la orden de compra
                              </div>
                              <div class="accordion" id="paymentMethods">
                                <!-- Deposito Bancario -->
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingBank">
                                    <button class="accordion-button collapsed d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBank" aria-expanded="false" aria-controls="collapseBank">
                                      <img
                                      src="https://pngimg.com/uploads/bank/bank_PNG3.png"
                                      class="pay-img-max me-3" alt="Bank Icon"> Deposito Bancario
                                    </button>
                                  </h2>
                                  <div id="collapseBank" class="accordion-collapse collapse" aria-labelledby="headingBank" data-bs-parent="#paymentMethods">
                                     <div class="accordion-body">
                                          <p>Selecciona una cuenta bancaria para efectuar el pago:</p>
                                          <div class="form-check">
                                              <input class="form-check-input"
                                              type="radio" name="pago"
                                              id="bbvaAccount"
                                              value="Transferencia digital BBVA">
                                              <label class="form-check-label" 
                                                for="bbvaAccount">
                                                  Usar cuenta BBVA
                                              </label>
                                          </div>
                                          <div class="form-check">
                                              <input class="form-check-input"
                                              type="radio" name="pago"
                                              id="bcpAccount"
                                              value="Transferencia digital BCP">
                                              <label class="form-check-label" for="bcpAccount">
                                                  Usar cuenta BCP
                                              </label>
                                          </div>
                                          <div class="form-check">
                                              <input class="form-check-input"
                                              type="radio" name="pago"
                                              id="bancoNacionAccount"
                                              value="Deposito en Banco de la Nacion">
                                              <label class="form-check-label" for="bancoNacionAccount">
                                                  Usar cuenta de Banco de la Nación
                                              </label>
                                          </div>
                                          <p class="mt-3">Los detalles para efectuar el pago se mostrarán luego de generar la orden de compra.</p>
                                        </div>
                                  </div>
                                </div>
                                <!--  Yape -->
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingYape">
                                    <button class="accordion-button collapsed d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseYape" aria-expanded="false" aria-controls="collapseYape">
                                      <img src="https://images.seeklogo.com/logo-png/38/1/yape-logo-png_seeklogo-381640.png?v=638658858130000000" 
                                      class="pay-img-max me-3" alt="Yape Icon"> Yape
                                    </button>
                                  </h2>
                                  <div id="collapseYape" class="accordion-collapse collapse" aria-labelledby="headingYape" data-bs-parent="#paymentMethods">
                                    <div class="accordion-body">
                                        <div class="form-check">
                                              <input class="form-check-input"
                                              type="radio" name="pago" id="yape"
                                              value="Pago en yape">
                                              <label class="form-check-label"
                                                  for="yape">
                                                 Pagar con yape 
                                              </label>
                                          </div>
                                          <small>
                                              Los detalles para efectuar el pago se
                                        mostraran luego de generar la orden de
                                        compra
                                          </small>
                                    </div>
                                  </div>
                                </div>
                                <!-- Plin -->
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingPlin">
                                    <button class="accordion-button collapsed d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePlin" aria-expanded="false" aria-controls="collapsePlin">
                                      <img src="https://images.seeklogo.com/logo-png/38/1/plin-logo-png_seeklogo-386806.png?v=638660522030000000" 
                                      class="pay-img-max me-3" alt="Plin Icon"> Plin
                                    </button>
                                  </h2>
                                  <div id="collapsePlin" class="accordion-collapse collapse" aria-labelledby="headingPlin" data-bs-parent="#paymentMethods">
                                    <div class="accordion-body">
                                        <div class="form-check">
                                              <input class="form-check-input"
                                              type="radio" name="pago" id="plin"
                                              value="Pago en plin">
                                              <label class="form-check-label"
                                                  for="plin">
                                                 Pagar con plin 
                                              </label>
                                          </div>
                                          <small>
                                                Los detalles para efectuar el pago se
                                                mostraran luego de generar la orden de
                                                compra
                                          </small>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="total-final-price">
                <div class="price-modal">
                    <div>
                    <div class="cart-total-card">
                        <i style="font-size:1.5em;"
                            class="fa-solid fa-cart-shopping"
                        >
                        </i>
                        <span>Mi carrito</span>
                    </div>
                        @php
                            $totalConDescuento = 0;
                            $totalSinDescuento = 0;
                            $productosMinimos= 0;
                        @endphp
                        @if (Cart::count())
                        @foreach(Cart::content() as $item)
                            <div class="item-buy-total">
                                <div class="item-cart-product-count_imagev">
                                    <img
                                        src="{{asset('images/' . $item->options->imagenes) }}"
                                        alt="{{ $item->name }}"
                                        style="max-width: 100px; max-height: 100px;"
                                        class="img-cart-tumb ima"
                                    >
                                </div>
                                <div class="item-cart-product-name_description">
                                    <p
                                        class="name-item-product"
                                        style="font-size:1.2em;font-weight:bold;"
                                    >
                                    {{ $item->name }} X {{$item->qty}}
                                    </p>
                                </div>
                                <div class="item-cart-product-pricesummary">
                                    <p class="current-price">
                                        S/{{ number_format($item->qty *
                                        ($item->price -
                                        ($item->price *
                                        ($item->options->descuento / 100))), 2) }}
                                    </p>
                               <p class="old-price">
                                  S/{{ number_format($item->price * $item->qty, 2) }}
                               </p >
                            </div>
                        </div>
                        @php
                            $totalConDescuento += $item->qty * ($item->price - ($item->price * ($item->options->descuento / 100)));
                            $totalSinDescuento += $item->price * $item->qty;
                            $productosMinimos += $item->qty;
                        @endphp
                        @endforeach
                        @endif
                    </div>
                        <div class="cart-content-summary-subtotal">
                            <span>Subtotal</span>
                            <span>
                            <span class="old-price">S/{{ number_format($totalSinDescuento, 2) }}</span>
                            </span>
                        </div>
                        <hr>
                        <input type="hidden" name="precioTotal"
                                             value="{{$totalConDescuento}}">
                        <div class="cart-content-summary-total">
                            <span>Total a pagar</span>
                            <span>
                            <span class="current-price">S/{{ number_format($totalConDescuento, 2) }}</span>
                            </span>
                        </div>
                        <div class="terms-btn-pagar">
                        <p style="color:#949494;">
                            Al hacer click en “pagar”, aceptas nuestros
                            terminos y condiciones y
                            politica de privacidad.
                        </p>
                        <button type="submit" id="pagarBtn" class="btn btn-gotopay">
                           SOLICITAR 
                        </button>
                        </div>
                    </div>
                    <a 
                        href="{{route('checkout')}}"
                        class="btn btn-secondary btn-continue-step-buy">
                        Cancelar Solicitud 
                    </a >
            </div>
        </div>
        <!-- Modal de confirmacion-->
<div id="confirmModal" class="modal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmación de Orden de Compra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de generar la orden de compra?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="confirmOrderBtn">Confirmar</button>
            </div>
        </div>
    </div>
</div>

    </form>
    <script src="{{asset('js/addNewAddressPopUp.js')}}"></script>
    <script src="{{asset('js/sendOption.js')}}"></script>
    <script>
        function cerrarPopUp(){
            popUpLayout = document.getElementById('orderPopUp');
            btnCancelar = document.getElementById('cerrarBtn');
            btnCancelar.addEventListener('click',()=>{
                popUpLayout.style.display = 'none';        
            })
        }

    document.addEventListener('DOMContentLoaded', function() {
    const continuarBtn = document.querySelector('.');
    
    const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
    const confirmOrderBtn = document.getElementById('confirmOrderBtn');

    continuarBtn.addEventListener('click', function(event) {
        event.preventDefault();  
        confirmModal.show();
    });

    confirmOrderBtn.addEventListener('click', function() {
        document.querySelector('form').submit();  
    });
});

        document.querySelectorAll('.radio-button').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.radio-button').forEach(
                    btn => btn.classList.remove('active')
                );
                button.classList.add('active');
            });
        });
    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#pais').on('change', function() {
            var paisId = $(this).val();
            if (paisId) {
                $.ajax({
                    url: '{{ route("getDepartamentos") }}',
                    type: 'GET',
                    data: { pais_id: paisId },
                    success: function(data) {
                        $('#departamento').empty().append('<option value="">Selecciona tu Departamento</option>');
                        $.each(data, function(key, value) {
                            $('#departamento').append('<option value="' + value.idDepartamento + '">' + value.nombreDepartamento + '</option>');
                        });
                    }
                });
            } else {
                $('#departamento').empty().append('<option value="">Selecciona tu Departamento</option>');
                $('#provincia').empty().append('<option value="">Selecciona tu Provincia</option>');
                $('#idDistrito').empty().append('<option value="">Selecciona tu Distrito</option>');
            }
        });

        $('#departamento').on('change', function() {
            var departamentoId = $(this).val();
            if (departamentoId) {
                $.ajax({
                    url: '{{ route("getProvincias") }}',
                    type: 'GET',
                    data: { departamento_id: departamentoId },
                    success: function(data) {
                        $('#provincia').empty().append('<option value="">Selecciona tu Provincia</option>');
                        $.each(data, function(key, value) {
                            $('#provincia').append('<option value="' + value.idProvincia + '">' + value.nombreProvincia + '</option>');
                        });
                    }
                });
            } else {
                $('#provincia').empty().append('<option value="">Selecciona tu Provincia</option>');
                $('#idDistrito').empty().append('<option value="">Selecciona tu Distrito</option>');
            }
        });

        $('#provincia').on('change', function() {
            var provinciaId = $(this).val();
            if (provinciaId) {
                $.ajax({
                    url: '{{ route("getDistritos") }}',
                    type: 'GET',
                    data: { provincia_id: provinciaId },
                    success: function(data) {
                        $('#idDistrito').empty().append('<option value="">Selecciona tu Distrito</option>');
                        $.each(data, function(key, value) {
                            $('#idDistrito').append('<option value="' + value.idDistrito + '">' + value.nombreDistrito + '</option>');
                        });
                    }
                });
            } else {
                $('#idDistrito').empty().append('<option value="">Selecciona tu Distrito</option>');
            }
        });

    });

const btnPagar = document.getElementById('pagarBtn');
const pagoRadios = document.querySelectorAll('input[name="pago"]');

    btnPagar.disabled = true;

pagoRadios.forEach(pago=> {
    pago.addEventListener('change', () => {
        const isChecked = document.querySelector('input[name="pago"]:checked');
        btnPagar.disabled = !isChecked;
        if (isChecked) {
            btnPagar.classList.add('btn-success'); 
            btnPagar.classList.remove('btn-primary'); 
        } else {
            btnPagar.classList.add('btn-primary'); 
            btnPagar.classList.remove('btn-success'); 
        }
    });
});


</script>


@endsection

