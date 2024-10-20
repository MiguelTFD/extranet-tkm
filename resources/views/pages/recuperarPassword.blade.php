
<style>
.login-container {
   width: 500px;
   heigth:600px;
   margin: 100px auto;
   padding: 20px;
   background-color: #fff;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
   border-radius: 10px;
}

.login-form {
   padding:5em 4em;
   display: flex;
   flex-direction: column;
}

.form-group {
   margin-bottom: 45px;
}

label {
   font-size: 14px;
   margin-bottom: 5px;
   color: #333;
}

input[type="text"],
input[type="password"] {
   width: 100%;
   padding: 10px;
   border: 1px solid #fff;
   border-radius: 10px;
   background-color: #EDEDED;
}

.forgot-password {
   display: block;
   text-align: right;
   font-size: 12px;
   color: #7B311E;
   margin-bottom: 20px;
   text-decoration: none;
}

.login-btn {
   width: 100%;
   padding: 10px;
   background-color: #9A9B01;
   color: white;
   border: none;
   border-radius: 5px;
   cursor: pointer;
   font-size: 16px;
}

.login-btn:hover {
   background-color: #868901;
}

.register-link {
   text-align: center;
   margin-top: 10px;
   font-size: 14px;
}

.register-link a {
   color: #9A9B01;
   text-decoration: none;
}

.register-link a:hover {
   text-decoration: underline;
}
.iniSesCt{
    height:100vh;
}

.footer-container{
    display:none !important;
}

</style>



@extends('layouts.base')

@section('content')
    <div>
     <div class="iniSesCt">
        <h1 style="text-align:center">Recuperar Contraseña</h1>
        <div class="login-container">
           <form action="/recuperar" method="POST" class="login-form">
              <div class="form-group">
                 <label for="username">Usuario</label>
                 <input type="text" id="username" name="username" placeholder="Ingresa tu nombre de usuario" required>
              </div>
              <button type="submit" class="login-btn">Solicitar Recuperacion</button>
              <div class="register-link">
                 <p>¿Ya tienes una cuenta?</p> 
                 <a  href="{{ route('iniciarSesion') }}">Iniciar Sesion</a>
                </div>
           </form>
        </div>
        </div>
    </div>

@endsection
