{{-- resources/views/layouts/header.blade.php --}}
@php
    $user = auth()->user();
@endphp
@include('components.cartButton')
<style>

#logout-div{
    display:none !important ;
}
#cerrarSesionBtn{
    display:none !important ;
}
#iniciarSesionBtn{
    display: inherit !important;
}
#iniciarSesionBtn2{
    display: inherit !important;
}
</style>
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
    </div>
</div>
<!-- Spinner End -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="{{ url('/') }}" 
        class="navbar-brand d-flex align-items-center px-4 px-lg-5"
    >
        <img class="tkmlogo" src="{{ asset('images/icon/TKMLogo.png')}}"/>
        <h1 id="lgD" class="m-0">The King Moss</h1>
    </a>
    <button
        type="button"
        class="navbar-toggler me-4"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse"
    >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a
                href="{{ route('about') }}"
                class="nav-item nav-link"
            >
                Nosotros
            </a>
            <a
                href="{{ route('products') }}"
                class="nav-item nav-link"
            >
                Tienda
            </a>
            <a
                href="{{ route('contact') }}"
                class="nav-item nav-link"
            >
                Contáctenos
            </a>
        </div>
        @if($user)
            <a 
                id="iniciarSesionBtn" 
                href="{{ route('showUserProfile') }}" 
                class="btn btn-primary py-4 px-lg-4 rounded-0  d-lg-block"
            >
                Mi Perfil 
                <i class="fa fa-arrow-right ms-3"></i>
            </a>
            <form 
                id="logout-form" 
                action="{{ route('userLogout') }}" 
                method="POST" 
                style="display: none;"
            >
                @csrf
            </form>
            <a 
                id="cerrarSesionBtn"
                style="background:#7B311E;color:white;border:unset;" 
                href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-warning py-4 px-lg-4 rounded-0 d-none d-lg-block">
                Cerrar Sesión
                <i class="fa fa-arrow-right ms-3"></i>
            </a>
        @else
            <a 
                id="iniciarSesionBtn2"  
                href="{{ route('userLogin') }}" 
                class="btn btn-primary py-4 px-lg-4 rounded-0  d-lg-block">
                Iniciar Sesión
                <i class="fa fa-arrow-right ms-3"></i>
            </a>
        @endif


</nav>

<!--wsp_component_start-->
<div class="wsp-master-container">
    <div class="wsp-1-1">
        <div class="inner_wsp-1-1 dnf-inner">
            <div class="wsp-1-2-1">
                <img class="wsp-1-2-1_img"
                src="{{asset('images/icon/TKMLogo.png')}}"/> 
                <p class="usrname"> 
                    <span class="user-wsp-name">
                        The King Moss
                    </span>En Linea
                </p>
            </div>			
            <div class="wsp-1-2-2">
                <div class="wsp-1-2-2-1">
                <p>Hola, Que tal?👋<br>
                    Estoy aqui para ayudarte, Asi que dime lo que necesitas el dia de hoy🤓
                </p>
            </div>
        </div>			
        <div class="wsp-1-2-3">
            <textarea id='message' class="send-label" placeholder="Ingresa tu mensaje..." inputmode="text"></textarea>
            <button 
                style="color: rgb(255, 255, 255);" 
                onclick="sendMessage()" 
                class="send-icon-lb"
            >
                <span 
                    class="ButtonBase__Overlay-sc-p43e7i-4 cjTloD" 
                    style="padding: 6px; border-radius: calc(14px); background-color: rgba(0, 0, 0, 0);"
                >
                    <span 
                        class="ButtonBase__Ellipsis-sc-p43e7i-5 dqiKFy"
                    >
                    </span>
                    <div 
                        class="Icon__IconContainer-sc-11wrh3u-0 jOAIgD ButtonBase__ButtonIcon-sc-p43e7i-0 gMSomS"
                    >
                        <div>
                            <div>
                                <svg 
                                    fill="#ffffff" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 28 28" 
                                    class="injected-svg" 
                                    data-src="https://static.elfsight.com/icons/app-chats-send-message.svg" 
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                >
                                    <path 
                                        d="M9.166 7.5a.714.714 0 0 0-.998.83l1.152 4.304a.571.571 0 0 0 .47.418l5.649.807c.163.023.163.26 0 .283l-5.648.806a.572.572 0 0 0-.47.418l-1.153 4.307a.714.714 0 0 0 .998.83l12.284-5.857a.715.715 0 0 0 0-1.29L9.166 7.5Z"
                                    >
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </span> 
            </button>
        </div>
        </div>
    </div>

    <div class="wsp-1-2">
        <button class="btn-base-wsp-contact dfn-wsp">
        <img class="wsp-1-2_wsp-logo" src="{{asset('images/wsp_light_logo.png')}}"/>
        </button>
    </div>
</div>



