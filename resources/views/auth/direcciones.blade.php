@extends('layouts.base')

@section('content')
<style>

    .wsp-1-2 , #btn-carrito{
        display:none !important;
    }

.entrega-options{
    justify-content: right !important;
}
@media(max-width:767px){
    .entrega-options{
        justify-content: center !important;
    }
    .entrega-options-1{
        margin-right:unset !important;
    }
}

#iniciarSesionBtn{
    display:none !important;
}
.entrega-options-1 {
  margin-right: 4.3em;
  margin-top: 2em;
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
        display: flex;
        align-items: center;
        background: #f0f0f0;
        border-radius: 15px;
        padding: 15px;
        margin: 10px 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 90%;
    }

    .icon {
        font-size: 2em;
        color: #ccc;
        margin-right: 15px;
    }

      .address-details {
         flex-grow: 1;
         text-align: left;
             margin-left:3em;
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

.footer-container{
    display:none !important;
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
.abc{
    height: fit-content;
    margin: 3% auto;
}
    </style>

       <div id="orderPopUp">
                <div class="popUpModal">
                    <div class="">
                        <div class="modal-content p-4">
                            <h2 
                                class="text-center mb-4"
                            >
                                Agrega una nueva dirección de envío
                            </h2>
                            <form 
                                method="POST" 
                                action="{{ route('direccionNueva') }}"
                            >
                            @csrf
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="pais" 
                                            class="form-label"
                                        >
                                            País
                                        </label>
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
<div class="container-fluid">
    <div class="row">
        @include('components.opcionesUsuario')
        <div style="background:white;" class="col-md-9 content abc">
<div id="te-layout">

</div>
         </div>
</div>
 </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
function cerrarPopUp(){
            popUpLayout = document.getElementById('orderPopUp');
            btnCancelar = document.getElementById('cerrarBtn');
            btnCancelar.addEventListener('click',()=>{
                popUpLayout.style.display = 'none';        
            })
}
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
document.addEventListener('DOMContentLoaded', () => {
    // Maneja el clic en el botón "Editar"
    document.querySelectorAll('.btn-edit').forEach(button => {
        button.addEventListener('click', event => {
            const id = event.target.dataset.id; // Obtén el ID de la dirección
            const form = document.getElementById(`editForm-${id}`);
            const otherForms = document.querySelectorAll('.edit-form:not(#editForm-' + id + ')');

            // Oculta otros formularios abiertos
            otherForms.forEach(f => f.classList.add('d-none'));

            // Alterna la visibilidad del formulario
            form.classList.toggle('d-none');
        });
    });

    // Maneja el clic en el botón "Cancelar"
    document.querySelectorAll('.btn-cancel').forEach(button => {
        button.addEventListener('click', event => {
            const form = event.target.closest('.edit-form');
            form.classList.add('d-none'); // Oculta el formulario
        });
    });
});

</script>

<script>
function viewPopUpNewAddress() {
    let popUp = document.getElementById('orderPopUp');
    popUp.style.display = 'flex';
}

    function mostrarDirecciones(){
    let formaEntregaContainer = document.getElementById('te-layout');

    fetch('/api/direcciones')
        .then(response => response.json())
        .then(direcciones => {
            let htmlContent = `
                <h3 class="text-center">Tus Direcciones</h3>
                <div class="address-card-ct">`;

            if (direcciones.length === 0) {
                htmlContent += `<p>No tienes direcciones registradas.</p>`;
            } else {
                direcciones.forEach(direccion => {
                    htmlContent += `
                        <div class="address-card">
                            <i class="medium-font fa-solid fa-house"></i>
                            <div class="address-details">
                                <p>${direccion.pais}/${direccion.departamento}/${direccion.provincia}/${direccion.distrito}</p>
                                <p>${direccion.direccionExacta}</p>
                                <p>${direccion.referencia}</p>
                            </div>
                                                    </div>`;
                });
            }
            htmlContent += `
                </div>
                <div class="entrega-options">
                    <div class="entrega-options-1">
                        <small>Agregar otra dirección de entrega</small>
                        <a href="javascript:void(0);" id="addNewAddressPopUp">Agregar nueva dirección</a>
                    </div>
                </div>
                `;
            formaEntregaContainer.innerHTML = htmlContent;
            document.getElementById('addNewAddressPopUp')
                .addEventListener('click', viewPopUpNewAddress); 
            
            
        })
        .catch(error => console.error('Error cargando direcciones:', error));
}

document.addEventListener("DOMContentLoaded", function() {
    mostrarDirecciones();
});
</script>
@endsection
