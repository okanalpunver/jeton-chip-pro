@extends('admin._layouts.index')

@section('content')
    
    @if (request()->route()->getName() == "admin.$routeBase.edit")
        {{ html()->modelForm($model, 'PUT', route('admin.admin.update', $model))->class('kt-form kt-form--label-right')->open() }}
    @else
        {{ html()->form('POST', route("admin.$routeBase.store"))->class('kt-form kt-form--label-right')->open() }}
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
        
            @component('admin._components.form', [
                'horizontal' => true,
                'rows' => [
                    [
                        'name' => [
                            'label' => 'Ad Soyad', 
                            'type' => 'text', 
                        ],
                    ],

                    [
                        'email' => [
                            'label' => 'E-Posta Adresi', 
                            'type' => 'text', 
                        ],
                    ],
                    
                    ['seperator' => 'Güvenlik'],

                    [

                        'password' => [
                            'label' => 'Parola', 
                            'type' => 'password', 
                        ],
                    ],

                    [
                        'password_confirmation' => [
                            'label' => 'Parola tekrarı',
                            'type' => 'password'
                        ]
                    ]
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