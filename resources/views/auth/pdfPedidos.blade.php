<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>The King Moss</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 150px;
        }

        .header-info {
            text-align: right;
        }

        h1, h2, h3 {
            font-size: 24px;
            margin: 10px 0;
        }

        .section-title {
            font-size: 18px;
            margin-top: 20px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .panel {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .panel-body {
            padding: 10px;
            font-size: 14px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table th, .table td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .total-table {
            margin-top: 20px;
            font-size: 16px;
        }

        .total-table td {
            padding: 8px;
        }

        .total-table .total {
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <!--Imagen logo-->
                <img src="logo.png" alt="Logo" />
            </div>
            <div class="header-info">
                <b>Fecha: </b> {{ $datosOrdenCompra['fechaOrdenCompra'] }}<br />
                <b>Pedido #: </b> {{ $datosOrdenCompra['idOrdenCompra'] }}<br />
            </div>
        </div>
        <h2>Pedido # {{ $datosOrdenCompra['idOrdenCompra'] }}</h2>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Datos del negocio:</th>
                        <th>Datos del cliente:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            King Moss SAC<br />
                            RUC: 10724859441 <br />
                            Tel: +51 983 929 015<br />
                            Ubi: Peru/Satipo/Rio Negro<br />
                        </td>
                        <td>
                        Nom: {{$usuario->nombre}} {{$usuario->apellido}}<br/>
                        Tel: {{$usuario->telefono}}<br/>
                        Email: {{$usuario->correo}}<br />
                        Username: {{$usuario->username}}<br />
                        Doc: {{$usuario->documentoIdentidad->tipoDocumentoIdentidad->nombreTipoDocumentoIdentidad}}
                        |{{$usuario->documentoIdentidad->numeroDocumentoIdentidad}}<br />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="section-title">Items:</div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datosOrdenCompra['detalles'] as $detalle)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $detalle['nombreProducto'] }}</td>
                        <td>{{ $detalle['cantidad'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="display: flex; justify-content: space-between;">
            <div style="width: 45%;">
                <div class="section-title">Instrucción de entrega:</div>
                <div class="panel">
                    <div class="panel-body">
                        {{$datosOrdenCompra['instruccionEntrega']}}
                    </div>
                </div>
            </div>

            <div style="width: 45%;">
                <div class="section-title">Total:</div>
                <table class="table total-table">
                    <tbody>
                        <tr>
                            <td>TOTAL</td>
                            <td class="total">S/{{ $datosOrdenCompra['precioTotal'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="footer">
            <p>¡Gracias por tu preferencia.!</p>
        </div>
    </div>
</body>
</html>

