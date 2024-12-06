@extends('layouts.base')

@section('content')
<style>
.steps-container{
    margin-top:2em;
}
    #metodosDePago{
        display:none;
    }
    .total-final-price{
        display:none;
    }
    .wsp-1-2{
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
        .btn-continue-step-buy {
              width: 100%;
            }
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
                                    <option 
                                        value="{{ $pais->idPais }}"
                                    >
                                        {{ $pais->nombrePais }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label 
                                for="departamento" 
                                class="form-label"
                            >
                                Departamento
                            </label>
                            <select 
                                id="departamento" 
                                name="departamento" 
                                class="form-select"
                            >
                                <option 
                                    selected 
                                    disabled
                                >
                                    Selecciona tu Departamento
                                </option>
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
                    <div class="mb-3">
                        <label for="agencia">Agencia de envio</label>
                        <input type="text" name="agencia" 
                        class="form-control" 
                        id="agencia" 
                        value="{{ old('agencia') }}" 
                        placeholder="Shalom, Olva, Etc." required
                    >
                    <p 
                        class="info-icon" 
                        style="color:#949494;font-size:0.9em;text-align:left; "
                    > 
                        Usaremos esta agencia para proceder con el envio de tu compra
                    </p>
                    </div>
                    <div class="mb-3">
                        <label 
                            for="sedeAgencia"
                        >
                            Agencia de envio
                        </label>
                        <input 
                            type="text" 
                            name="sedeAgencia" 
                            class="form-control" 
                            id="sedeAgencia" 
                            value="{{ old('sedeAgencia') }}" 
                            placeholder="Ingresa la sede o direccion de tu agencia elegida." 
                            required
                        >
                        <p 
                            class="info-icon" 
                            style="color:#949494;font-size:0.9em;text-align:left; "
                        >
                            Esta direccion sera util para enviarte 
                            tu pedido lo mas cerca a tu ubicacion
                        </p>
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
    <div class="steps-container">
   <div class="stp active" id="step1-nav">
      <span class="material-symbols-outlined st-icon fill-icon">
            local_shipping
      </span>
   </div>
   <div class="stp pending" >
      <span 
        id="step2-nav"
          class="material-symbols-outlined st-icon ">
         payments
      </span>
   </div>
   <div class="stp pending" >
      <span class="material-symbols-outlined st-icon "id="step3-nav">
         verified
      </span> 
   </div>
</div>
    </div>
    <form method="Post" action="{{ route('newOrderRequest') }}">
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
                    <div id="metodosDePago">
                        @include('components.paymentsOptions')
                        <div class="row" style="gap: 1em;">
                        <button
                            class="btn btn-secondary btn-continue-step-buy"
                            type="button"
                            onclick="irAtras()"
                        >
                            Retorceder 
                        </button>
                <button type="button" class="btn btn-primary btn-continue-step-buy" 
                            id="nextBtnConfirm"
                            onclick="showSumaryModal()"
                        >
                            Continuar
                        </button>
                        </div>
                    </div>
            <div id ="idk23" class="total-final-price">
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
                                    @if($item->options->descuento>0)
                                    <p class="old-price">
                                       S/{{ number_format($item->price * $item->qty, 2) }}
                                    </p >
                                    @endif
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
                        @if($totalConDescuento != $totalSinDescuento)
                        <div class="cart-content-summary-subtotal">
                            <span>Subtotal</span>
                            <span>
                            <span class="old-price">S/{{ number_format($totalSinDescuento, 2) }}</span>
                            </span>
                        </div>
                        <hr>
                        @endif
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
                            Al hacer click en “Solicitar”, aceptas nuestros
                            terminos y condiciones y
                            politica de privacidad.
                        </p>
                        <button type="submit" id="pagarBtn" class="btn btn-gotopay">
                           SOLICITAR 
                        </button>
                        </div>
                    </div>
                    <div class="row" style="gap: 1em;">
                        <button
                            class="btn btn-secondary btn-continue-step-buy"
                            type="button"
                            onclick="irAtras2()"
                        >
                            Retorceder
                        </button>
                    <a 
                        href="{{route('checkout')}}"
                        class="btn btn-secondary btn-continue-step-buy"
                        style="background: #b7b7b7; border: none;"
                    >
                        Cancelar Solicitud 
                    </a >
                    </div>
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

    btnPagar.disabled = true;

function viewPopUpNewAddress() {
    let popUp = document.getElementById('orderPopUp');
    popUp.style.display = 'flex';
}
function mostrarDelivery() {
    let formaEntregaContainer = document.getElementById('fe-layout');

    fetch('/api/direcciones')
        .then(response => response.json())
        .then(direcciones => {
      console.log(direcciones);  
            let htmlContent = `
                <h3>Elige tu forma de entrega</h3>
                <h5 style="color:#636363;margin-left: 24px;">
                    Delivery | Elige tu dirección de entrega
                </h5>
                <div class="address-card-ct">`;

            if (direcciones.length === 0) {
                htmlContent += `<p>No tienes direcciones registradas.</p>`;
            } else {
                direcciones.forEach(direccion => {
                    htmlContent += `
                        <div class="address-card">
                            <i class="medium-font fa-solid fa-location-dot"></i>
                            <div class="address-details">
                                <p>${direccion.pais}/${direccion.departamento}/${direccion.provincia}/${direccion.distrito}</p>
                                <p>${direccion.agencia}</p>
                                <p>${direccion.sedeAgencia}</p>
                            </div>
                            <input type="radio" id="direccion-${direccion.idDireccion}" name="direcciones" value="${direccion.idDireccion}">
                        </div>`;
                });
            }

            htmlContent += `
                </div>
                <style>
                .info-icon::before{
                    content:url(images/icon/info.svg);
                }
                </style>
                <div class="entrega-options">
                    <div class="entrega-options-1">
                        <small>Agregar otra dirección de entrega</small>
                        <a href="javascript:void(0);" id="addNewAddressPopUp">Agregar nueva dirección</a>
                    </div>
                </div>
                <div class="row" style="gap: 1em;">
                    <a 
                        href="/cart/checkout"
                        class="btn btn-secondary btn-continue-step-buy">
                        Cancelar Solicitud 
                    </a >
                <button type="button" class="btn btn-primary  btn-continue-step-buy" id="btnContinuar" disabled>
                    Continuar
                </button>
                </div>
                `;
            formaEntregaContainer.innerHTML = htmlContent;
            document.getElementById('addNewAddressPopUp').addEventListener('click', viewPopUpNewAddress);
            
            const btnContinuar = document.getElementById('btnContinuar');
            btnContinuar.addEventListener('click', nextStepBuy,nextStep); 
            
            const radios = document.querySelectorAll('input[name="direcciones"]');
            btnContinuar.disabled = true;
            
            radios.forEach(radio => {
                radio.addEventListener('change', () => {
                    btnContinuar.disabled = !document.querySelector('input[name="direcciones"]:checked');
                });
            });
                         

            let currentStep = 1;
            
            function showStep(step){
               document.querySelectorAll('.st-icon').forEach((element, index)=>{
                  element.className='material-symbols-outlined st-icon ' +
                  (index + 1 === step ? 'fill-icon' : (index + 1 < step ? 'fill-icon' : 'pending'));
               });
            
               document.querySelectorAll('.step-content').forEach((element, index) => {
                  element.className = 'step-content ' + (index + 1 === step ? 'active' : '');
               });
               }
            function nextStep() {
               if (currentStep === 1) {
                  if (document.querySelector('input[name="payment"]:checked')) {
                     currentStep++;
                     showStep(currentStep);
                  }
                  else{
                     alert('Selecciona un método de pago.');
                  }
               }
               else if (currentStep === 2) {
                  document.getElementById('confirmation-message').style.display = 'flex';
                  document.getElementById('confirmation-message').style.justifyContent= 'center';
                  document.getElementById('confirmation-message').style.height= '100%';
                  currentStep++;
                  showStep(currentStep);
               }
            }
            
            function prevStep() {
               if (currentStep === 3) {
                  document.getElementById('confirmation-message').style.display = 'none';
               }
               currentStep--;
               showStep(currentStep);
            }
            function nextStepBuy(){
                let successEntrega = document.getElementsByClassName('forma-entrega-layout'); 
                let oldEntregaCt = document.getElementById('fe-layout');
                let pagoShowCt = document.getElementById('metodosDePago');
                oldEntregaCt.style.display='none';
                pagoShowCt.style.display = 'inherit';
                let pagoIcono= document.getElementById('step2-nav');
                pagoIcono.style.color='#7B311E';
            }
           })
                    .catch(error => console.error('Error cargando direcciones:', error));
            }


document.addEventListener("DOMContentLoaded", function() {
    mostrarDelivery();
});
</script>
    <script>

function showSumaryModal(){
    let successEntrega = document.getElementById('idk23'); 
    let pagoShowCt = document.getElementById('metodosDePago');
    pagoShowCt.style.display='none';
    successEntrega.style.display='flex';
    let verificadoIcono= document.getElementById('step3-nav');
    verificadoIcono.style.color='#7b311e';
    const btnPagar = document.getElementById('pagarBtn');
    btnPagar.disabled = false;
    btnPagar.classList.add('btn-success');
}
function irAtras(){
    let pagoShowCt = document.getElementById('metodosDePago');
    let successEntrega = document.getElementById('fe-layout'); 
    pagoShowCt.style.display='none';
    successEntrega.style.display='inherit';
    let pagoIcono= document.getElementById('step2-nav');
    pagoIcono.style.color='#525368';
}
function irAtras2(){
    let pagoShowCt = document.getElementById('metodosDePago');
    let summary = document.getElementById('idk23');
    summary.style.display='none';
    pagoShowCt.style.display='inherit';
    let verificadoIcono= document.getElementById('step3-nav');
    verificadoIcono.style.color='#525368';
}
</script>


@endsection

