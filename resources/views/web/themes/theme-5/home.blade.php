@extends('web.themes.theme-5._master')

@section('content')

    <section class="section section-no-border section-quaternary my-0">
        <div class="container">

            @component('web._components.products', [
                'size' => 'text-5',
                'btn' => 'btn btn-primary font-weight-bold btn-px-1 btn-py-2 text-uppercase'
            ])

            @endcomponent
        </div>
    </section>


    @component('web._components.testimonials', [
        'bg' => 'dark'
    ])

    @endcomponent


@endsection
