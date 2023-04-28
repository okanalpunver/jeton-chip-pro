@extends('admin._layouts.index')

@section('content')
    
    {{ html()->modelForm($model, 'PUT', route("admin.$routeBase.about.update", $model))->class('kt-form kt-form--label-right')->open() }}

    @component('admin._components.subheader', [
        'title' => 'Sayfalar',
        'desc' => 'Hakkımızda'
    ])

        <button type="submit" class="btn btn-brand">Kaydet</button>

    @endcomponent

    @component('admin._components.content')
        
        @component('admin._components.portlet', [
            'title' => "Hakkımızda Sayfası",
            'desc' => "Lütfen içeriği giriniz"
        ])

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
        
            @component('admin._components.form', [
                'horizontal' => true,
                'rows' => [
                    [
                        'about' => [
                            'label' => 'İçerik',
                            'type' => 'textarea',
                            'attributes' => [
                                'rows' => 10
                            ]
                        ],
                    ],
                ]
            ])
            @endcomponent
            
        @endcomponent
        
    @endcomponent

    {{ html()->closeModelForm() }}


@endsection