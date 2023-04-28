@extends('admin._layouts.index')

@section('content')
    
    @if (request()->route()->getName() == "admin.$routeBase.edit")
        {{ html()->modelForm($model, 'PUT', route("admin.$routeBase.update", $model))->class('kt-form kt-form--label-right')->open() }}
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
                'horizontal' => false,
                'rows' => [
                    [
                        'status' => [
                            'label' => 'Durum', 
                            'type' => 'select',
                            // 'value' => $model->status,
                            'options' => [
                                '-1' => 'Ödeme Bekliyor',
                                '1' => 'Ödeme Alındı',
                                '2' => 'İptal Edildi',
                                '3' => 'Teslim Edildi',
                            ]
                        ],

                        'amount' => [
                            'label' => 'Toplam Tutar',
                            'type' =>  'text',
                            'value' => money($model->amount * 100),
                            'attributes' => [
                                'disabled' => 'disabled'
                            ]
                        ],

                        'cat' => [
                            'label' => $model->categories()->first()->name,
                            'type' =>  'text',
                            'value' => number_format($model->categories()->first()->pivot->qty, 0, ',', '.'),
                            'attributes' => [
                                'disabled' => 'disabled'
                            ]
                        ],

                    ],

                    [
                        'name' => [
                            'label' => 'Ad Soyad',
                            'type' =>  'text',
                            'value' => $model->user->name,
                            'attributes' => [
                                'disabled' => 'disabled'
                            ]
                        ],

                        'email' => [
                            'label' => 'E-Posta Adresi',
                            'type' =>  'text',
                            'value' => $model->user->email,
                            'attributes' => [
                                'disabled' => 'disabled'
                            ]
                        ],

                        'phone' => [
                            'label' => 'Telefon',
                            'type' =>  'text',
                            'value' => $model->user->phone,
                            'attributes' => [
                                'disabled' => 'disabled'
                            ]
                        ],
                    ],

                    [
                        'facebook_email' => [
                            'label' => 'Facebook E-Posta Adresi',
                            'type' =>  'text',
                            'value' => $model->categories()->first()->pivot->extra['facebook_email'],
                            'attributes' => [
                                'disabled' => 'disabled'
                            ]
                        ],

                        'facebook_password' => [
                            'label' => 'Facebook Parola',
                            'type' =>  'text',
                            'value' => $model->categories()->first()->pivot->extra['facebook_password'],
                            'attributes' => [
                                'disabled' => 'disabled'
                            ]
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