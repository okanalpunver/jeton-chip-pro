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
                    'Site',
                    'Sipariş No',
                    'Ad, Soyad',
                    'E-Posta',
                    'Telefon',
                    'IP Adresi',
                    'Toplam Tutar',
                    'Ödeme Türü',
                    'Eklenme Tarihi',
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
                {data: 'site.name', name: 'site.name', orderable: false, sortable: false},
                {data: 'order_id', name: 'order_id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'ip_address', name: 'ip_address'},
                {data: 'total_amount', name: 'total_amount', render: $.fn.dataTable.render.money()},
                {data: 'payment_type', name: 'payment_type'},
                {data: 'created_at', name: 'created_at', render: $.fn.dataTable.render.dateTime()},
            ]
        });
    });
</script>
@endpush