@extends('admin._layouts.index')

@section('content')

    {{ html()->modelForm($model, 'PUT', route("admin.seller.buy.update", $model))->class('kt-form kt-form--label-right')->open() }}

    @component('admin._components.subheader', [
        'title' => 'Alış Fiyatı',
        'desc' => 'Description'
    ])

        <button type="submit" class="btn btn-brand">Kaydet</button>

    @endcomponent

    @component('admin._components.content')

        @component('admin._components.portlet', [
            'title' => "Alış Fiyat Bilgileri",
            'desc' => "Lütfen bilgileri giriniz"
        ])

            @component('admin._components.form', [
                'horizontal' => false,
                'rows' => [


                    [
                        'value' => [
                            'label' => 'Alış Fiyatı',
                            'type' =>  'text',
                            'value' => $model->value,

                        ],

                    ],
                ]
            ])
            @endcomponent

        @endcomponent

    @endcomponent

    {{ html()->closeModelForm() }}

@endsection
