@extends('admin._layouts.index')

@section('content')

    <link rel="stylesheet" href="/treeData/css/treeData.css"/>
    <script src="/treeData/js/treeData.js"></script>

    @component('admin._components.subheader', [
        'title' => 'Normal Kullanıcılar',
        'desc' => 'Description'
    ])

        {{--        <a href="{{ route("admin.$routeBase.create") }}" class="btn btn-brand">Yeni {{ $singularLabel }}</a>--}}

    @endcomponent

    @component('admin._components.content')

        @component('admin._components.portlet')

            <table class="table responsive">
                <thead>
                <tr>
                    <td>İsim</td>
                    <td>Email</td>
                    <td>Telefon</td>
                    <td></td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                   @foreach($users as $user)

                       <tr>
                           <td>{{$user->name}}</td>
                           <td>{{$user->email}}</td>
                           <td>{{$user->phone}}</td>
                           <td><a href="{{route('admin.admin.api.nestedUsersList',$user->id)}}" class="btn btn-primary">Hiyerarşiyi Göster</a></td>
                           <td>
                              @if($user->status)
                                   <form action="/admin/user/status/active/{{$user->id}}" method="POST">
                                       @csrf
                                       <button class="btn btn-danger">Kullanıcıyı Pasifleştir</button>
                                   </form>
                               @else
                                   <form action="/admin/user/status/passive/{{$user->id}}" method="POST">
                                       @csrf
                                       <button class="btn btn-success">Kullanıcıyı Aktifleştir</button>
                                   </form>
                              @endif
                           </td>
                           <td>
                               @if(\App\Models\Seller::query()->where('email', $user->email)->first())

                                       <button class="btn btn-success">Satıcı</button>
                               @else
                                   <form action="/admin/user/seller/{{$user->id}}" method="POST">
                                       @csrf
                                       <button class="btn btn-dark">Satıcı Yap</button>
                                   </form>

                               @endif


                           </td>
                       </tr>

                   @endforeach
                </tbody>
            </table>

        @endcomponent
    @endcomponent

@endsection


