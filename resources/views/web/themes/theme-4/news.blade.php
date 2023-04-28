@extends('web.themes.theme-4._master', [
    'title' => __('News')
])

@section('content')
    <section class="section section-no-border section-dark custom-padding-top-1 mb-0 pb-0">
        <div class="container">

            <div class="overflow-hidden mb-1">
                <h1 class="font-weight-bold text-color-primary">{{ __('News') }}</h1>
            </div>

            <div class="row">
                <div class="col-md-9">
                    @foreach ($news as $item)
                        <div class="news-item pb-4">
                            <div>
                                <img src="{{ '/storage/'.$item->image }}" alt="" class="img-fluid">
                            </div>
                            <h2>{{ $item->title }}</h2>
                            <div>
                                {{ Illuminate\Mail\Markdown::parse($item->excerpt) }}
                                <a class="btn btn-primary" href="{{ route('web.news.show', $item->id) }}">{{ __('Continue') }}</a>
                            </div>
                        </div>
                        @if (!$loop->last)
                            <hr style="background: rgba(255, 240, 240, 0.13);">
                        @endif

                    @endforeach
                </div>
                <div class="d-none d-md-flex flex-column justify-content-end col-md-3">
                    <img src="/frontend/img/zynga-lady.png" alt="" class="img-fluid">
                </div>
            </div>


        </div>
    </section>

    @component('web._components.testimonials', [
        'bg' => 'dark'
    ])

    @endcomponent

@endsection
