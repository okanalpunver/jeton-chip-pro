@extends('admin._layouts.index')

@section('content')
    
    @component('admin._components.subheader', [
        'title' => $label,
        'desc' => 'Chip satmak isteyen müşteriler'
    ])

    <a href="{{ route("admin.$routeBase.create") }}" class="btn btn-brand">Yeni {{ $singularLabel }}</a>

    @endcomponent

    @component('admin._components.content')
        
        @component('admin._components.portlet')
        
            @component('admin._components.table', [
                'fields' => [
                    '#',
                    'Ad',
                    'E-Posta Adresi',
                    'Telefon',
                    'Adet',
                    'Tutar',
                    'Durum',
                    'Eklenme Tarihi',
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
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'qty', name: 'qty'},
                {data: 'amount', name: 'amount'},
                {data: 'status', name: 'status', render: function (data,type, row) {
                    var html;
                    switch (data) {
                        case '1':
                            html = `<span class="btn btn-bold btn-sm btn-font-sm btn-label-primary">Teslim Alındı</span>`;
                            break;

                        case '2':
                            html = `<span class="btn btn-bold btn-sm btn-font-sm btn-label-danger">İptal Edildi</span>`;
                            break;

                        default:
                            html = `<span class="btn btn-bold btn-sm btn-font-sm btn-label-warning">Bekliyor</span>`;
                            break;
                    }

                    return html;
                }},
                {data: 'created_at', name: 'created_at', render: $.fn.dataTable.render.dateTime()},
                {data: 'id', sortable: false, searchable: false, 
                    render: function(data, type, row){
                        if (row.status == 1) {
                            
                            return $.fn.dataTable.render.action(data, type, row, '{{ route("admin.$routeBase.index") }}', {
                                edit: true,
                                delete: false,
                                
                            });
                        } 

                        return $.fn.dataTable.render.action(data, type, row, '{{ route("admin.$routeBase.index") }}', {
                            edit: true,
                            delete: true,
                        });
                        
                    }
                }
            ]
        });
    });
</script>
@endpush