@extends('web.themes.theme-1._master')

@section('content')
    {{-- <div class="container position-relative z-index-1 py-md-5 py-lg-0 mt-md-5 mb-5 mt-lg-0 mb-lg-0">
        <div class="row align-items-center justify-content-center pt-5 py-lg-0" style="height: 100vh; min-height: 900px;">
            <chip></chip>
            <div class="col-md-8 col-lg-5 col-xl-6 align-self-xl-stretch order-1 order-lg-2">
                <img src="/frontend/img/poker-chips.png" class="img-fluid custom-product-image-style-1 appear-animation" alt="" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200" />
            </div>
        </div>
    </div> --}}

    @component('web._components.whatsapp')
        
    @endcomponent

    <section class="section section-height-3 bg-color-grey-scale-1 border-0 m-0 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="200">
        <div class="container">
            @component('web._components.products')
                
            @endcomponent
        </div>
    </section>

    
    {{-- <div class="home-intro bg-color-grey-scale-9" id="home-intro">
        <div class="container">
    
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <p class="text-center text-lg-left" style="color: #212529;">
                            Whatsapp Destek Hattımız 
                        <span style="color: #212529;">Sitemiz hakkında tüm konularda sizlerin sorularına cevap vermek için hizmetinize sunulmuştur</span>
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="get-started text-center text-lg-right">
                        <img src="/frontend/img/whatsapp.png" height="100" alt="">
                    </div>
                </div>
            </div>
    
        </div>
    </div> --}}

    
    @component('web._components.testimonials', [
        'bg' => 'light'
    ])
        
    @endcomponent
@endsection
