@extends('layouts.base')
    @section('content')


<div class="container-fluid page-header page-contact py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Contacto</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item"><a href="#">Páginas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contacto</li>
            </ol>
        </nav>
    </div>
</div>



<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <p class="fs-5 fw-bold text-primary">Contactanos!</p>
                <h1 class="display-5 mb-5">Si tienes alguna duda o consulta, Contactanos por favor</h1>
                <form id="contactForm">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa tu nombre">
                                <label for="name">Nombre</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Ingresa el asunto de tu consulta">
                                <label for="subject">Asunto</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Ingresa aqui tu duda o consulta..." id="message" name="message" style="height: 100px"></textarea>
                                <label for="message">Mensaje</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button id="sendEmailButton" class="btn btn-primary py-3 px-4" type="button">Enviar Mensaje</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                <div class="position-relative rounded overflow-hidden h-100">
                    <iframe class="position-relative w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15654.70025368086!2d-74.6624638!3d-11.2116598!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x910bc6cbbcdf2b1d%3A0xcd1c4a47b69415a0!2sR%C3%ADo%20Negro%2012876!5e0!3m2!1ses-419!2spe!4v1725034414923!5m2!1ses-419!2spe"
                            frameborder="0" style="min-height: 450px; border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

    @endsection
