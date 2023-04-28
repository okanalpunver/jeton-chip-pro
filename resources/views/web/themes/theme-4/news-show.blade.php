@extends('web.themes.theme-4._master', [
    'title' => __('News')
])

@section('content')
    <section class="section section-no-border section-dark custom-padding-top-1 mb-0 pb-0">
        <div class="container">

            <div class="overflow-hidden mb-1">
                <h1 class="font-weight-bold text-color-primary">{{ __('News') }}</h1>
            </div>

            <div class="row pb-5">

                <div class="col-md-9">
                    <div>
                        <img src="{{ '/storage/'.$news->image }}" alt="" class="img-fluid">
                    </div>
                    <h2>{{ $news->title }}</h2>
                    <div>
                        {{ Illuminate\Mail\Markdown::parse($news->body) }}
                    </div>
                </div>

                <div class="col-md-3">
                    <ul class="nav nav-pills nav-fill flex-column">
                        @foreach ($site->news as $item)
                        <li class="nav-item">
                            <a class="nav-link {{ ($item->id == $news->id) ? 'active' : '' }}" href="{{ route('web.news.show', $item->id) }}">{{ $item->title }}</a>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </section>

    @component('web._components.testimonials', [
        'bg' => 'dark'
    ])

    @endcomponent

@endsection
