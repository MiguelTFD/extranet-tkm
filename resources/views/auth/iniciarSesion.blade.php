
{{--resources/views/pages/iniciarSesion.blade.php--}}

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
    padding:3em 2em;
   display: flex;
   flex-direction: column;
}

.form-group {
   margin-bottom: 15px;
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
    <div class="iniSesCt">
        <h1 style="text-align:center">
            Iniciar Sesion 
        </h1>
        <div class="login-container">
            <form 
               action="{{route('login')}}" 
               method="POST" 
               class="login-form"
            >
            @csrf
                <div class="form-group">
                    <label for="username">
                        Usuario
                    </label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        placeholder="Ingresa tu nombre de usuario" required
                    >
                </div>
                <div class="form-group">
                    <label for="password">
                        Contraseña
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Ingresa tu contraseña" required
                    >
                </div>
                <div class="form-group">
                <a 
                    href="{{route('recuperarPassword')}}" 
                    class="forgot-password"
                >
                    Olvide mi contraseña
                </a>
                </div>
                <button 
                    type="submit" 
                    class="login-btn"
                >
                    Iniciar Sesion
                </button>
                <div class="register-link">
                    <p>¿No tienes una cuenta?</p> 
                    <a 
                        href="{{route('registrarUsuario')}}"
                    >
                        Registrarme como cliente
                    </a>
                </div>
           </form>
           @if($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
