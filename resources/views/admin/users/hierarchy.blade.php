@extends('admin._layouts.index')

@section('content')

    <link rel="stylesheet" href="/treeData/css/treeData.css" />
    <script src="/treeData/js/treeData.js"></script>

    @component('admin._components.subheader', [
        'title' => 'Normal Kullanıcılar',
        'desc' => 'Description'
    ])

        {{--        <a href="{{ route("admin.$routeBase.create") }}" class="btn btn-brand">Yeni {{ $singularLabel }}</a>--}}

    @endcomponent

    @component('admin._components.content')

        @component('admin._components.portlet')


            <div id="tree" style="display: flex; align-self: center;"></div>

            <script>

                var xmlHttp = new XMLHttpRequest();
                xmlHttp.open( "GET", "/admin/nested-user/api/{{$id}}", false ); // false for synchronous request
                xmlHttp.send( null );
                console.log(xmlHttp.responseText);
                var treeData = JSON.parse(xmlHttp.responseText);
                TreeData(treeData, "#tree");
            </script>


        @endcomponent
    @endcomponent

@endsection
