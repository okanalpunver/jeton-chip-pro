@extends('admin._layouts.index')

@section('content')
    
    @component('admin._components.subheader', [
        'title' => 'Dashboard',
        'desc' => 'Description'
    ])

    @endcomponent

    @component('admin._components.content')
        
        {{-- @component('admin._components.portlet')

            <h1>welcome</h1>
        @endcomponent --}}
        
    @endcomponent


@endsection
