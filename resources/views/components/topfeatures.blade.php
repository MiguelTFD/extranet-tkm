{{-- resources/views/components/topfeatures.blade.php --}}
<div class="container-fluid top-feature py-5 pt-lg-0">
    <div class="container py-5 pt-lg-0">
        <div class="row gx-0">
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div 
                    class="bg-white shadow d-flex align-items-center h-100 px-5" 
                    style="min-height: 160px;"
                >
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                            <img src="{{asset('images/icon/attach_money_16dp_929302_FILL0_wght400_GRAD0_opsz20.svg')}}" alt="money">
                        </div>
                        <div class="ps-3">
                            <h4>Precios Competitivos</h4>
                            <span>Nuestros precios nos diferencian del resto</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                            <img src="{{asset('images/icon/groups_24dp_929302_FILL0_wght400_GRAD0_opsz24.svg')}}" src="teams">
                        </div>
                        <div class="ps-3">
                            <h4>Equipo Comprometido</h4>
                            <span>Contamos con un equipo dedicado y profesional</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                            <img src="{{asset('images/icon/call_16dp_929302_FILL0_wght400_GRAD0_opsz20.svg')}}" alt="phone">
                        </div>
                        <div class="ps-3">
                            <h4>Atencion al cliente 24/7</h4>
                            <span>Resolvemos tus dudas al instante</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
