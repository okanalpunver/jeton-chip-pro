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
                    'Banka',
                    'Hesap Sahibi',
                    'Şube No',
                    'Hesap No',
                    'IBAN',
                    'Masrafsız',
                    // 'Durum',
                    'Eklenme Tarihi',
                    // 'Güncellenme',
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
            order: [6, 'desc'],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'account_holder', name: 'account_holder'},
                {data: 'branch_number', name: 'branch_number'},
                {data: 'account_number', name: 'account_number'},
                {data: 'iban', name: 'iban', render: $.fn.dataTable.render.iban()},
                {data: 'is_free_atm', name: 'is_free_atm', class: 'text-center', render: $.fn.dataTable.render.boolean()},
                // {data: 'status', name: 'status', class: 'text-center', render: $.fn.dataTable.render.boolean()},
                {data: 'created_at', name: 'created_at', render: $.fn.dataTable.render.dateTime()},
                // {data: 'updated_at', name: 'updated_at', render: $.fn.dataTable.render.dateTime()},
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