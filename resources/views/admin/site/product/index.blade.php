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
                    'Kategori',
                    'Adet',
                    'Fiyat',
                    'Eklenme Tarihi',
                    'Düzenlenme Tarihi',
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
                {data: 'id', name: 'products.id', class: 'text-right'},
                {data: 'category.name', name: 'category.name'},
                {data: 'qty', name: 'qty', class: 'text-right', render: $.fn.dataTable.render.number(',')},
                {data: 'price', name: 'price', class: 'text-right text-nowrap', render: $.fn.dataTable.render.money()},
                {data: 'created_at', class: 'text-center', name: 'created_at', render: $.fn.dataTable.render.dateTime()},
                {data: 'updated_at', class: 'text-center', name: 'updated_at', render: $.fn.dataTable.render.dateTime()},
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
