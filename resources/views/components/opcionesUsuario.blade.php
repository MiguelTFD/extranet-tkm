<style>

#logout-div{
    display:inherit !important;
}
#iniciarSesionBtn{
    display:none !important;
}
#cerrarSesionBtn{
    display:inherit !important ;
}

</style>
<nav class="col-md-3 col-lg-2 d-md-block sidebar">
    <ul style="gap:3em;" class="nav flex-column">
        <div>        
            <p style="padding: 0.5rem 1rem;color:#707070;font-weight:bold;">
                Perfil
            </p>
            <li class="nav-item">
                <a 
                    class="nav-link {{ Request::routeIs('showUserProfile') ? 'active' : '' }}" 
                    href="{{ route('showUserProfile') }}"
                >
                    Personal
                </a>
            </li>
            <li class="nav-item">
                <a 
                    class="nav-link {{ Request::routeIs('getUserAddress') ? 'active' : '' }}" 
                    href="{{ route('getUserAddress') }}"
                >
                    Direcciones
                </a>
            </li>
        </div>
        <div>
            <p style="padding: 0.5rem 1rem;color:#707070;font-weight:bold;">
                Compras 
            </p>
            <li class="nav-item">
                <a 
                    class="nav-link {{ Request::routeIs('getUserOrders') ? 'active' : '' }}" 
                    href="{{ route('getUserOrders') }}"
                >
                    Mis pedidos
                </a>
            </li>
        </div>
    </ul>
</nav>

