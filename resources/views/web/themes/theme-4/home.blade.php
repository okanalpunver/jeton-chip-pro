@extends('web.themes.theme-4._master')

@section('content')
    {{-- <div class="slider-container rev_slider_wrapper" style="height: 100vh;">
        <div id="revolutionSlider" class="slider rev_slider manual" data-version="5.4.8">
            <ul>
                <li data-transition="fade">
                    <img src="{{ (!empty($site->background)) ? '/storage/'.$site->background : '/frontend/img/bg/bg-01.jpg' }}"
                        alt=""
                        data-bgposition="center center"
                        data-bgfit="cover"
                        data-bgrepeat="no-repeat"
                        data-bgparallax="1"
                        class="rev-slidebg">
                </li>

            </ul>

            <div class="tp-static-layers w-100 pt-5">
                <div class="d-flex section-quaternary justify-content-center pt-5" data-x="center" data-hoffset="160" data-y="center" data-voffset="160" data-start="300" data-startslide="0"
                data-endslide="99" data-transform_in="y:[-300%];opacity:0;s:500;" id="app">
                    <chip-with-image
                        image1="{{ (!empty($site->image1)) ? '/storage/'.$site->image1 : '/frontend/img/dollar-bag.png' }}"
                        kampanya_line1="{{ $site->kampanya_line1 }}"
                        kampanya_line2="{{ $site->kampanya_line2 }}"
                        heading_1="{{ $site->heading_1 }}"
                        heading_2="{{ $site->heading_2 }}"
                        home_text="{{ $site->home_text }}"
                        amount_of_chips="{{ __('Amount of Chips') }}"
                        in_game_value="{{ __('In Game Value') }}"
                        buy_now="{{ __('Buy Now') }}"
                        enter_amount="{{ __('Enter amount...') }}"
                        currency="{{ $site->currency }}"
                        class="pt-5">
                    </chip-with-image>
                </div>

            </div>
        </div>
    </div> --}}

    

    <section class="section section-no-border section-quaternary my-0">
        <div class="container">

            @component('web._components.products', [
                'size' => 'text-5'
            ])

            @endcomponent
        </div>
    </section>

    @component('web._components.whatsapp')
    @endcomponent


    @component('web._components.testimonials', [
        'bg' => 'dark'
    ])

    @endcomponent


@endsection
