
@extends('layouts.base')

@section('content')
<style>
.prodSectionCt{
    display:grid;
    grid-template-columns:25% 75%;
        width: 70%;
margin: 0 auto;
}

@media (max-width: 1200px) {

    .prodSectionCt{
        display:flex;
        flex-direction:column;
    }
}

@media (max-width: 400px) {

    .prodSectionCt{
        display:flex;
        flex-direction:column;
    }
}


</style>



<div class="container-fluid page-header page-products py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">
           Productos
        </h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                   <a href="#">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                   <a href="#">Páginas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Productos
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="prodSectionCt">
    @include('components.catSelector',['categorias'=>$categorias])
    @include('components.catXprod', ['productos' => $productos])
</div>

@endsection
