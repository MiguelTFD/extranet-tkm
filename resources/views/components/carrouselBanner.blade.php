{{-- resources/views/components/carrouselBanner.blade.php --}}

<div 
    class="container-fluid p-0 wow fadeIn" 
    data-wow-delay="0.1s" 
    id="idk"
>
    <div 
        id="header-carousel" 
        class="carousel slide" 
        data-bs-ride="carousel"
    >
        <div 
            class="carousel-inner"
        >
            <div 
                class="carousel-item active"
            >
                <img 
                    class="w-100" 
                    src="{{asset('images/carousel-1.webp')}}" 
                    alt="Image" 
                    loading="lazy"
                >
                <div 
                    class="carousel-caption"
                >
                    <div 
                        class="container"
                    >
                        <div 
                            class="row justify-content-center"
                        >
                            <div 
                                class="col-lg-8"
                            >
                                <h1 
                                    class="display-1 text-white mb-5 animated slideInDown"
                                >
                                    Obten la mejor calidad al mejor precio
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div 
                class="carousel-item"
            >
                <img 
                    class="w-100" 
                    src="{{asset('images/carousel-2.webp')}}"
                    alt="Image" 
                    loading="lazy"
                >
                <div 
                    class="carousel-caption"
                >
                    <div 
                        class="container"
                    >
                        <div 
                            class="row justify-content-center"
                        >
                            <div 
                                class="col-lg-7"
                            >
                                <h1 
                                    class="display-1 text-white mb-5 animated slideInDown"
                                >
                                    Descubre nuestra calidad 
                                    y variedad de musgos que 
                                    tenemos para ti 
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button 
            class="carousel-control-prev" 
            type="button" 
            data-bs-target="#header-carousel"
            data-bs-slide="prev"
        >
            <span 
                class="carousel-control-prev-icon" 
                aria-hidden="true"
            >
            </span>
            <span 
                class="visually-hidden"
            >
                Previous
            </span>
        </button>
        <button 
            class="carousel-control-next" 
            type="button" 
            data-bs-target="#header-carousel"
            data-bs-slide="next"
        >
            <span 
                class="carousel-control-next-icon" 
                aria-hidden="true"
            >
            </span>
            <span 
                class="visually-hidden"
            >
                Next
            </span>
        </button>
    </div>
</div>
