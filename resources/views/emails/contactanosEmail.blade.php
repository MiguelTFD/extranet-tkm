<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contacto Enviado</title>
</head>
<body>
    <h1> Nueva Mensaje de Contacto:{{$data['subject']}} </h1>
    <p><b>Nombre: </b></p><p>{{$data['name']}}</p>
    <p><b>Telefono: </b></p><p>{{$data['telefono']}}</p>
    <p><b>Correo: </b></p><p>{{$data['email']}}</p>
    <p><b>Mensaje: </b></p>
     <p>
        {{$data['message']}}
     </p>
</body>
</html>

