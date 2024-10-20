<style>
.register-container {
   width: 80%;
   margin: 50px auto;
   padding: 20px;
   background-color: #fff;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.0);
   border-radius: 10px;
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
   justify-content: space-between;
}

.form-group {
   flex: 1;
   margin: 0 10px 20px 10px;
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
}

.register-btn:hover {
   background-color: #868901;
}

.footer-container{
    display:none !important;
}

</style>

@extends('layouts.base')

@section('content')

    <div class="register-container">
   <h2>REGISTRAR CLIENTE</h2>
   <form action="/register" method="POST" class="register-form">
      <div class="row">
         <div class="form-group">
            <label for="first_name">Nombres</label>
            <input type="text" id="first_name" name="first_name" placeholder="Ingresa tus nombres" required>
         </div>
         <div class="form-group">
            <label for="last_name">Apellidos</label>
            <input type="text" id="last_name" name="last_name" placeholder="Ingresa tus apellidos" required>
         </div>
      </div>

      <div class="row">
         <div class="form-group">
            <label for="phone">Teléfono</label>
            <div class="phone-input">
               <span class="country-code">🇵🇪 +51</span>
               <input type="text" id="phone" name="phone" placeholder="Ingresa tu teléfono" required>
            </div>
         </div>
         <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Ingresa tu email" required>
         </div>
      </div>

      <div class="row">
         <div class="form-group">
            <label for="doc_type">Doc. IDe</label>
            <select id="doc_type" name="doc_type">
               <option value="DNI">DNI</option>
               <option value="Passport">Pasaporte</option>
            </select>
            <input type="text" id="doc_number" name="doc_number" placeholder="Ingresa tu documento de identidad" required>
         </div>
         <div class="form-group">
            <label for="dob">Fecha de Nacimiento</label>
            <input type="date" id="dob" name="dob" value="2022-11-23" required>
         </div>
      </div>

      <div class="row">
         <div class="form-group">
            <label for="country">País</label>
            <select id="country" name="country">
               <option value="">Selecciona tu País</option>
               <!-- Opciones de países -->
            </select>
         </div>
         <div class="form-group">
            <label for="state">Estado/Región</label>
            <select id="state" name="state">
               <option value="">Selecciona tu Estado</option>
               <!-- Opciones de estados -->
            </select>
         </div>
         <div class="form-group">
            <label for="city">Ciudad</label>
            <select id="city" name="city">
               <option value="">Selecciona tu Ciudad</option>
               <!-- Opciones de ciudades -->
            </select>
         </div>
      </div>

      <div class="form-group">
         <label for="address">Dirección</label>
         <input type="text" id="address" name="address" placeholder="Ingresa tu dirección" required>
      </div>

      <div class="row">
         <div class="form-group">
            <label for="username">Nombre de Usuario</label>
            <input type="text" id="username" name="username" placeholder="Ingresa un nombre de usuario" required>
         </div>
         <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Ingresa una contraseña" required>
         </div>
         <div class="form-group">
            <label for="confirm_password">Contraseña</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Repite nuevamente tu contraseña" required>
         </div>
      </div>

      <button type="submit" class="register-btn">Registrarme</button>
   </form>
</div>


@endsection
