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
                        'name' => [
                            'label' => 'Ad Soyad',
                            'type' =>  'text',
                            'value' => $model->name ?? null,
                          
                        ],

                        'email' => [
                            'label' => 'E-Posta Adresi',
                            'type' =>  'text',
                            'value' => $model->email ?? null,
                           
                        ],

                        'phone' => [
                            'label' => 'Telefon',
                            'type' =>  'text',
                            'value' => $model->phone ?? null,
                            
                        ],
                    ],

                    [
                        'status' => [
                            'label' => 'Durum', 
                            'type' => 'select',
                            'value' => $model->status ?? 0,
                            'options' => [
                                '0' => 'Bekliyor',
                                '1' => 'Teslim Alındı',
                                '2' => 'İptal Edildi',
                            ]
                        ],

                        'qty' => [
                            'label' => 'Adet',
                            'type' =>  'text',
                            'value' =>$model->qty ?? null,
                        ],

                        'amount' => [
                            'label' => 'Toplam Tutar',
                            'type' =>  'text',
                            'value' => $model->amount ?? null,
                        ],

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