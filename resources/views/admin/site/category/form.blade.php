@extends('admin._layouts.index')

@section('content')
    
    @if (request()->route()->getName() == "admin.$routeBase.edit")
        {{ html()->modelForm($model, 'PUT', route("admin.$routeBase.update", $model))->class('kt-form kt-form--label-right')->acceptsFiles()->open() }}
    @else
        {{ html()->form('POST', route("admin.$routeBase.store"))->class('kt-form kt-form--label-right')->acceptsFiles()->open() }}
    @endif

    @component('admin._components.subheader', [
        'title' => $label,
        'desc' => 'Description'
    ])

        <button type="submit" class="btn btn-brand">Kaydet</button>

    @endcomponent

    @component('admin._components.content')
        
        @component('admin._components.portlet', [
            'title' => "$singularLabel Bilgileri",
            'desc' => "Lütfen ".strtolower($singularLabel)." bilgilerini giriniz"
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
                        'name' => [
                            'label' => 'Kategori adı',
                            'type' => 'text', 
                        ],
                    ],

                    [
                        'photo' => [
                            'label' => 'Resim',
                            'type' => 'file',
                            'class' => 'custom-file-input'
                        ]
                    ],
                ]
            ])
            @endcomponent
            
        @endcomponent
        
    @endcomponent

    @if (request()->route()->getName() == "admin.$routeBase.edit")
        {{ html()->closeModelForm() }}
    @else
        {{ html()->form()->close() }}
    @endif

@endsection