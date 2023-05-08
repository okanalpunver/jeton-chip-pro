@extends('admin._layouts.index')

@section('content')

    @component('admin._components.subheader', [
        'title' => 'Normal Kullanıcılar',
        'desc' => 'Description'
    ])
    @endcomponent

    @component('admin._components.content')

        @component('admin._components.portlet')

            <table class="table">
                <tr>
                    <th>Name:</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td>{{ $user->phone }}</td>
                </tr>
            </table>

        @endcomponent

    @endcomponent

@endsection
