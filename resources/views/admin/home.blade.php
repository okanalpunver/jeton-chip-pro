@extends('admin.index')

@section('content')
    
    <form action="">
    
    @component('admin._components.subheader', [
        'title' => 'Title',
        'desc' => 'Description'
    ])

        <button class="btn btn-brand">asd</button>

    @endcomponent

    @component('admin._components.content')
        
        @component('admin._components.portlet')

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in!
        @endcomponent
        
    @endcomponent

    </form>

@endsection
