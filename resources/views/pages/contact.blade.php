@extends('layouts.base')

@section('content')

@include('components.bannerPageInfo')

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <p class="fs-5 fw-bold text-primary">Contactanos!</p>
                <h1 
                    class="display-5 mb-5"
                >
                    Si tienes alguna duda o consulta, Contactanos por favor
                </h1>
                <form id="contactForm" action="{{route('sendContactEmail')}}"
                    method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="name" 
                                    name="name" 
                                    value="{{old('name')}}"
                                    placeholder="Ingresa tu nombre"
                                >
                                <label for="name">Nombre</label>
                                @error('name')
                                    <h6>{{$message}} </h6>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input
                                        type="text"
                                        class="form-control"
                                        id="telefono"
                                        value="{{old('telefono')}}"
                                        name="telefono"
                                        placeholder="Ingresa tu telefono"
                                >
                                <label for="telefono">Telefono</label>
                                @error('telefono')
                                <h6>{{$message}} </h6>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input 
                                    type="text" 
                                    class="form-control"
                                    id="email" 
                                    value="{{old('email')}}"
                                    name="email" 
                                    placeholder="Ingresa tu email"
                                >
                                <label for="email">Correo Electronico</label>
                                @error('email')
                                    <h6>{{$message}} </h6>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="subject" 
                                    name="subject" 
                                    value="{{old('subject')}}"
                                    placeholder="Ingresa el asunto de tu consulta"
                                >
                                <label for="subject">Asunto</label>
                                @error('subject')
                                    <h6>{{$message}} </h6>
                                @enderror

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea 
                                    class="form-control" 
                                    placeholder="Ingresa aqui tu duda o consulta..." 
                                    id="message" 
                                    name="message" 
                                    value="{{old('message')}}"
                                    style="height: 100px">
                                </textarea>
                                <label for="message">Mensaje</label>
                                @error('message')
                                <h6>{{$message}} </h6>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button id="sendEmailButton" class="btn btn-primary
                                py-3 px-4" type="submit">Enviar Mensaje</button>
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
