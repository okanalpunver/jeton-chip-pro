@extends('web.themes.theme-1._master', [
    'title' => 'Hakkımızda'
])

@section('content')

    <div class="container">
        {{ Illuminate\Mail\Markdown::parse($site->about) }}
    </div>

    @component('web._components.testimonials', [
        'bg' => 'light'
    ])
        
    @endcomponent
    
@endsection