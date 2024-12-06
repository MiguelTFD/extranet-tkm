<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
    <link rel="shortcut icon" type="x-icon" href="{{asset('images/icon/Logo.png')}}" >
    <title>The King Moss</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="" name="keywords">
	<meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Validator -->


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
   
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>



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


    .wsp-1-2 , #btn-carrito{
        display:none !important;
    }
</style>

<h1> Nueva pedido: </h1>
    
 <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Detalles de la Orden</h5>
                <div class="row mb-2">
                    <div class="col-6"><strong>N° Orden Compra</strong></div>
                    <div class="col-6 text-end">
                        <p style="color:#2D2D2E;font-weight:bold"> 

                        {{ $data['idOrdenCompra'] }}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Total a pagar</strong></div>
                    <div class="col-6 text-end">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        S/{{ $data['precioTotal'] }}
                        <p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Fecha</strong></div>
                    <div class="col-6 text-end">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $data['fechaOrdenCompra'] }}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Nombre del cliente</strong></div>
                    <div class="col-6 text-end">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $data['nombreCliente'] }}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Telefono del cliente</strong></div>
                    <div class="col-6 text-end">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $data['telefono'] }}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Correo del cliente</strong></div>
                    <div class="col-6 text-end">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $data['correo'] }}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Doc Ide. del cliente</strong></div>
                    <div class="col-6 text-end">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $data['DocIdentidad'] }}|{{$data['numDocIdentidad']}}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Información de la compra</strong></div>
                    <div class="col-6 text-end">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $data['informacionOrdenCompra'] }}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Instrucción de entrega</strong></div>
                    <div class="col-6 text-end">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $data['instruccionEntrega'] }}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Tipo de entrega</strong></div>
                    <div class="col-6 text-end">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $data['tipoEntrega'] }}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Localidad</strong></div>
                    <div class="col-6 text-end">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $data['direccion']}}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Agencia</strong></div>
                    <div class="col-6 text-end">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $data['agencia']}}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Sede de Agencia</strong></div>
                    <div class="col-6 text-end">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $data['sedeAgencia']}}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Método de pago</strong></div>
                    <div class="col-6 text-end">
                        <p id="pagoElegido">
                            {{$data['metodoPago']}}
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Estado</strong></div>
                    <div class="col-6 text-end">
                        <p style="color:#2D2D2E;font-weight:bold"> 
                        {{ $data['estadoOrdenCompra'] }}
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
                        @foreach($data['detalles'] as $dt)
                            <tr>
                                <td>
                                    {{ $dt['nombreProducto'] }}
                                </td>
                                <td 
                                    class="text-end"
                                >
                                    {{ $dt['cantidad'] }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    
    <script src="{{asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('lib/parallax/parallax.min.js')}}"></script>
    <script src="{{asset('lib/lightbox/js/lightbox.min.js')}}"></script>
    <script src="{{asset('lib/isotope/isotope.pkgd.min.js')}}"></script>  
    <script src="{{asset('js/main.js')}}"></script> 


</body>
</html>
