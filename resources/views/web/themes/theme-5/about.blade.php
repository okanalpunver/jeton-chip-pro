@extends('web.themes.theme-5._master', [
    'title' => __('About Us')
])

@section('content')
    <section class="section section-no-border section-dark custom-padding-top-1 mb-0 pb-0">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-7 col-lg-9">
                    <h1 class="font-weight-bold text-color-primary mb-0">{{ __('About Us') }}</h1>
                    {{ Illuminate\Mail\Markdown::parse($site->about) }}
                </div>
                <div class="col-md-5 col-lg-3">
                    <img src="/frontend/img/zynga-lady.png" alt="">
                </div>
            </div>
        </div>
    </section>

    @component('web._components.testimonials', [
        'bg' => 'dark'
    ])

    @endcomponent

@endsection
