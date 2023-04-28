@extends('web.themes.theme-5._master', [
    'title' => 'Ödeme Tamamlanamadı'
])

@section('content')
    <section class="section section-no-border section-quaternary custom-padding-top-1 my-0">
        <div class="container">
            <h1 class="font-weight-bold text-color-primary mb-0">{{ __('Failed') }}</h1>

            <p>{{ __('Payment Failed. Please try again or contact us.') }}</p>
        </div>
    </section>

    @component('web._components.testimonials', [
        'bg' => 'dark'
    ])
        
    @endcomponent
@endsection