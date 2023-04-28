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
                    'İsim',
                    'Yorum',
                    'Puan',
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
                {data: 'content', name: 'content'},
                {data: 'point', name: 'point'},
                {data: 'created_at', name: 'created_at', render: $.fn.dataTable.render.dateTime()},
                {data: 'updated_at', name: 'updated_at', render: $.fn.dataTable.render.dateTime()},
                {data: 'id', sortable: false, searchable: false, 
                    render: function(data, type, row){
                        return $.fn.dataTable.render.action(data, type, row, '{{ route("admin.$routeBase.index") }}');
                    }
                }
            ]
        });
    });
</script>
@endpush