@extends('admin._layouts.index')

@section('content')

    @component('admin._components.subheader', [
        'title' => 'Normal Kullanıcılar',
        'desc' => 'Description'
    ])

        {{--        <a href="{{ route("admin.$routeBase.create") }}" class="btn btn-brand">Yeni {{ $singularLabel }}</a>--}}

    @endcomponent

    @component('admin._components.content')

        @component('admin._components.portlet')

            <table class="table table-responsive">
                <thead>
                <tr>
                    <th></th>
                    <th>İsim</th>
                    <th>Email</th>
                    <th>Telefon</th>
                </tr>
                </thead>

                <tbody>
                <table class="table table-responsive">
                    <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <td>
                                {{$item->name}}
                            </td>
                            <td>
                                {{$item->email}}
                            </td>
                            <td>
                                {{$item->phone}}
                            </td>
                            <td>
                                <button data-toggle="collapse" data-target="#demo-{{$item->id}}"
                                        class="btn btn-default btn-xs"><span
                                            class="glyphicon glyphicon-eye-open"></span></button>
                            </td>
                        </tr>
                        @if (count($item->items))
                            <tr>
                                <td colspan="4">
                                    <div id="demo-{{$item->id}}" class="collapse">
                                        <table class="table table-responsive">
                                            <tbody>
                                            @foreach ($item->items as $child)
                                                <table class="table table-responsive">
                                                    <tbody>
                                                    {!! generateTreeView($item->items) !!}
                                                    </tbody>
                                                </table>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>

                @php
                    function generateTreeView($data) {
                        $html = '';
                        foreach ($data as $item) {
                            $html .= '<tr>';
                            $html .= '<td>' . $item->name . '</td>';
                            $html .= '<td>' . $item->email . '</td>';
                            $html .= '<td>' . $item->phone . '</td>';
                            $html .= '<td><button data-toggle="collapse" data-target="#demo-' . $item->id . '" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>';
                            $html .= '</tr>';
                            if (count($item->children)) {
                                $html .= '<tr>';
                                $html .= '<td colspan="4">';
                                $html .= '<div id="demo-' . $item->id . '" class="collapse">';
                                $html .= '<table class="table table-responsive">';
                                $html .= '<tbody>';
                                $html .= generateTreeView($item->children);
                                $html .= '</tbody>';
                                $html .= '</table>';
                                $html .= '</div>';
                                $html .= '</td>';
                                $html .= '</tr>';
                            }
                        }
                        return $html;
                    }
                @endphp

                </tbody>
            </table>

        @endcomponent
    @endcomponent

@endsection
