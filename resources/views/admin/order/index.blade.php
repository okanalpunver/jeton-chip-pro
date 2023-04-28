@extends('admin._layouts.index')

@section('content')

    @component('admin._components.subheader', [
        'title' => $label,
        'desc' => 'Description'
    ])

        {{-- <a href="{{ route("admin.$routeBase.create") }}" class="btn btn-brand">Yeni {{ $singularLabel }}</a> --}}

    @endcomponent

    @component('admin._components.content')

        @component('admin._components.portlet')

            @component('admin._components.table', [
                'fields' => [
                    '#',
                    'Site',
                    'Ürün',
                    'Adet',
                    'Tutar',
                    'Ad, Soyad',
                    // 'Email',
                    'Ödeme Türü',
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
                {data: 'site.name', name: 'site.name', orderable: false, searchable: false},
                {data: 'categories.[<br> ].name', orderable: false, searchable: false},
                {data: 'categories.[<br> ].pivot.qty', orderable: false, searchable: false, render: $.fn.dataTable.render.number(',')},
                {data: 'amount', name: 'amount', class: 'text-right text-nowrap', render: $.fn.dataTable.render.money()},
                {data: 'user.name', name: 'user.name'},
                // {data: 'user.email', name: 'user.email'},
                {data: 'payment.payment_type', name: 'payment.payment_type', class: 'text-center', orderable: false, searchable: false},
                {data: 'status', name: 'status', render: function (data,type, row) {
                    var html;
                    switch (data) {
                        case 1:
                            html = `<span class="btn btn-bold btn-sm btn-font-sm btn-label-primary">Ödeme Alındı</span>`;
                            break;

                        case 2:
                            html = `<span class="btn btn-bold btn-sm btn-font-sm btn-label-danger">İptal Edildi</span>`;
                            break;

                        case 3:
                            html = `<span class="btn btn-bold btn-sm btn-font-sm btn-label-success">Teslim Edildi</span>`;
                            break;

                        default:
                            html = `<span class="btn btn-bold btn-sm btn-font-sm btn-label-warning">Ödeme Bekliyor</span>`;
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
                                custom: [
                                    {
                                        url: `/order/${data}/done`,
                                        icon: 'flaticon2-checkmark',
                                        text: 'Siparişi teslim et'
                                    }
                                ]
                            });
                        }

                        return $.fn.dataTable.render.action(data, type, row, '{{ route("admin.$routeBase.index") }}', {
                            edit: true,
                            delete: false,
                        });

                    }
                }
            ]
        });
    });
</script>
@endpush
