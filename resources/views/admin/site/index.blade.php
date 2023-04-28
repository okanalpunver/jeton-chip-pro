@extends('admin._layouts.index')

@section('content')
    
    @component('admin._components.subheader', [
        'title' => $label,
        'desc' => 'Description'
    ])

        <a href="{{ route("admin.$routeBase.create") }}" class="btn btn-brand">Yeni {{ $singularLabel }}</a>

    @endcomponent

    @component('admin._components.content')
        
        @component('admin._components.portlet')
        
            @component('admin._components.table', [
                'fields' => [
                    '#',
                    'Açıklama',
                    'Alan adı',
                    'Durum',
                    'Eklenme Tarihi',
                    'Güncellenme',
                    ''
                ]
            ])
                
            @endcomponent
            
        @endcomponent
        
    @endcomponent

@endsection

@push('scripts')
<script>
    $(function () {
        var table = $('#table').DataTable({
            ajax: {
                url: "{{ route('admin.'.$routeBase.'.api') }}",
                method: 'POST'
            },
            order: [0, 'desc'],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'fqdn', name: 'fqdn'},
                {data: 'paytr_test_mode', name: 'paytr_test_mode', class: 'text-center', render: function (data, type, row) {
                    if (data == 0) {
                        return `<span class="btn btn-bold btn-sm btn-font-sm btn-label-success">CANLI</span>`;
                    }

                    return `<span class="btn btn-bold btn-sm btn-font-sm btn-label-danger">TEST</span>`;
                }},
                {data: 'created_at', name: 'created_at', render: $.fn.dataTable.render.dateTime()},
                {data: 'updated_at', name: 'updated_at', render: $.fn.dataTable.render.dateTime()},
                {data: 'id', sortable: false, searchable: false, 
                    render: function(data, type, row){
                        return $.fn.dataTable.render.action(data, type, row, '{{ $viewBase }}');
                    }
                }
            ]
        });
    });
</script>
@endpush