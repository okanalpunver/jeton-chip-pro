@extends('web.themes.theme-5._master')

@section('content')
    <section class="section section-no-border section-quaternary custom-padding-top-1 my-0">
        <div class="container">
            <h1 class="font-weight-bold text-color-primary mb-0">{{ __('We are temporarily unable to receive orders') }}</h1>

            <p>{!! __('Thank you for your understanding') !!}</p>
        </div>
    </section>

    @component('web._components.testimonials', [
        'bg' => 'dark'
    ])

    @endcomponent

@endsection
