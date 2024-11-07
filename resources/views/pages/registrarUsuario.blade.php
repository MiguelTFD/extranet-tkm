@extends('layouts.base')
@section('content')
<style>
.register-container {
   width: 90%; /* Cambiado de 80% a 90% para pantallas más pequeñas */
   max-width: 600px; /* Añadido un ancho máximo */
   margin: 50px auto;
   padding: 20px;
   background-color: #fff;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   border-radius: 10px;
}
.navbar-toggler{
    display:none !important;
}
#btn-carrito{
    display:none !important;
}
#navbarCollapse{

    display:none !important;
}
.register-container h2 {
   text-align: center;
   color: #9A9B01;
   font-size: 24px;
   margin-bottom: 20px;
}

.register-form {
   display: flex;
   flex-direction: column;
}

.row {
   display: flex;
   flex-wrap: wrap; /* Permitir que los elementos se envuelvan */
   justify-content: space-between;
}

.form-group {
   flex: 1 1 45%; /* Permitir que las columnas se reduzcan en tamaños más pequeños */
   margin: 0 10px 20px 10px;
}

@media (max-width: 600px) {
   .form-group {
      flex: 1 1 100%; /* En pantallas pequeñas, cada grupo ocupa el 100% */
      margin: 0 0 20px 0; /* Margen reducido */
   }
}

label {
   font-size: 14px;
   color: #333;
   margin-bottom: 5px;
   display: block;
}

input[type="text"],
input[type="email"],
input[type="date"],
input[type="password"],
select {
   width: 100%;
   padding: 10px;
   border: 1px solid #ddd;
   border-radius: 5px;
   background-color: #f2f2f2;
}

.phone-input {
   display: flex;
   align-items: center;
}

.country-code {
   background-color: #fff;
   padding: 10px;
   border: 1px solid #ddd;
   border-radius: 5px 0 0 5px;
   border-right: none;
}

.phone-input input {
   flex: 1;
   border-radius: 0 5px 5px 0;
}

.register-btn {
   width: 100%;
   padding: 10px;
   background-color: #9A9B01;
   color: white;
   border: none;
   border-radius: 5px;
   cursor: pointer;
   font-size: 16px;
   margin-top: 10px; /* Añadido margen superior */
}

.register-btn:hover {
   background-color: #868901;
}

.footer-container {
   display: none !important;
}


</style>


    <div class="register-container">
   <h2>REGISTRAR USUARIO</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

   <form action="{{ route('crearusuario') }}" method="POST" class="register-form">
       @csrf
      <div class="row">
         <div class="form-group">
            <label for="nombre">Nombres</label>
             <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre') }}" placeholder="Ingresa tus nombres"  required>

         </div>
         <div class="form-group">
            <label for="apellido">Apellidos</label>
             <input type="text" name="apellido" class="form-control" id="apellido" value="{{ old('apellido') }}" placeholder="Ingresa tus apellidos" required>
         </div>
      </div>

      <div class="row">
         <div class="form-group">
             <label for="telefono">Teléfono</label>
             <input type="text" name="telefono" class="form-control" id="telefono" value="{{ old('telefono') }}" placeholder="Ingresa tu teléfono" required>
         </div>
         <div class="form-group">
             <label for="correo">Correo</label>
             <input type="email" name="correo" class="form-control" id="correo" value="{{ old('correo') }}" placeholder="Ingresa tu email" required>
         </div>
      </div>

      <div class="row">
         <div class="form-group">
             <label for="idTipoDocumentoIdentidad">Tipo de Documento de Identidad</label>
             <select name="idTipoDocumentoIdentidad" class="form-control" id="idTipoDocumentoIdentidad" required>
                 <option value="">Seleccione el tipo de documento</option>
                 @foreach($tiposDocumento as $tipo)
                     <option value="{{ $tipo->idTipoDocumentoIdentidad }}">{{ $tipo->nombreTipoDocumentoIdentidad }}</option>
                 @endforeach
             </select>
             <label for="numeroDocumentoIdentidad">Número de Documento de Identidad</label>
             <input type="text" name="numeroDocumentoIdentidad" class="form-control" id="numeroDocumentoIdentidad" value="{{ old('numeroDocumentoIdentidad') }}" placeholder="Ingresa tu documento de identidad"  required>
         </div>
      </div>

       <div class="row">
           <div class="form-group">
               <label for="pais">País</label>
               <select id="pais" name="pais">
                   <option value="">Selecciona tu País</option>
                   @foreach($paises as $pais)
                       <option value="{{ $pais->idPais }}">{{ $pais->nombrePais }}</option>
                   @endforeach
               </select>
           </div>

           <div class="form-group">
               <label for="departamento">Departamento</label>
               <select id="departamento" name="departamento">
                   <option value="">Selecciona tu Departamento</option>
               </select>
           </div>

           <div class="form-group">
               <label for="provincia">Provincia</label>
               <select id="provincia" name="provincia">
                   <option value="">Selecciona tu Provincia</option>
               </select>
           </div>

           <div class="form-group">
               <label for="idDistrito">Distrito</label>
               <select id="idDistrito" name="idDistrito">
                   <option value="">Selecciona tu Distrito</option>
               </select>
           </div>
       </div>


       <div class="form-group">
          <label for="idTipoDireccion">Tipo de Dirección</label>
          <select name="idTipoDireccion" class="form-control" id="idTipoDireccion" required>
              <option value="">Seleccione el tipo de dirección</option>
              @foreach($tiposDireccion as $tipoDireccion)
                  <option value="{{ $tipoDireccion->idTipoDireccion }}">{{ $tipoDireccion->nombreTipo }}</option>
              @endforeach
          </select>
          <label for="direccionExacta">Dirección Exacta</label>
          <input type="text" name="direccionExacta" class="form-control" id="direccionExacta" value="{{ old('direccionExacta') }}" placeholder="Ingresa tu dirección exacta" required>
      </div>

       <div class="form-group">
           <label for="referencia">Referencia</label>
           <input type="text" name="referencia" class="form-control" id="referencia" value="{{ old('referencia') }}" placeholder="Danos una referencia de tu dirección" required>
       </div>


      <div class="row">
         <div class="form-group">

             <label for="username">Username</label>
             <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}" placeholder="Ingresa un nombre de usuario" required>
         </div>

         <div class="form-group">
             <label for="password">Password</label>
             <input type="password" name="password" class="form-control" id="password" placeholder="Ingresa una contraseña"  required>
         </div>


      </div>

      <button type="submit" class="register-btn">Registrarme</button>
   </form>
</div>

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
    </script>

@endsection
