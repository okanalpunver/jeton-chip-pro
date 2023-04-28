@extends('admin._layouts.index')

@section('content')

    @if (isset($model))
        {{ html()->modelForm($model, 'PUT', route("admin.$routeBase.update", $model))->class('kt-form kt-form--label-right')->acceptsFiles()->open() }}
    @else
        {{ html()->form('POST', route("admin.$routeBase.store"))->class('kt-form kt-form--label-right')->acceptsFiles()->open() }}
    @endif

    @component('admin._components.subheader', [
        'title' => $label,
        'desc' => (isset($model)) ? "$singularLabel güncelle" : 'Yeni '.strtolower($singularLabel).' ekle',
    ])

        <a href="{{ route("admin.$routeBase.index") }}" class="btn btn-label btn-label-primary btn-sm btn-bold">Tüm {{ $label }}</a>
        <button type="submit" class="btn btn-brand">Kaydet</button>

    @endcomponent

    @component('admin._components.content')

        @component('admin._components.portlet', [
            'title' => 'Site Bilgileri',
            'desc' => 'Lütfen site bilgilerini giriniz'
        ])

            @component('admin._components.form', [
                'rows' => [
                    [
                        'out_of_stock' => [
                            'type' => 'select',
                            'label' => 'Satış durumu',
                            'options' => [
                                '0' => 'Satışa açık',
                                '1' => 'Satışa kapalı'
                            ],
                            'col' => 'col-md-2'
                        ],
                    ],
                    [
                        'fqdn' => [
                            'label' => 'Alan adı',
                            'type' => 'text',
                            'class' => 'form-control-lg',
                        ],
                    ],

                    [
                        'name' => [
                            'label' => 'Site adı',
                            'type' => 'text',
                            'class' => 'form-control-lg',
                        ],
                    ],

                    [
                        'logo' => [
                            'label' => 'Logo',
                            'type' => 'file',
                            'class' => 'custom-file-input'
                        ]
                    ],

                    [
                        'background' => [
                            'label' => 'Arkaplan Resmi',
                            'type' => 'file',
                            'class' => 'custom-file-input'
                        ]
                    ],

                    [
                        'image1' => [
                            'label' => 'Anasayfa Resim',
                            'type' => 'file',
                            'class' => 'custom-file-input'
                        ]
                    ],


                    ['seperator' => 'Anasayfa Başlık'],

                    [
                        'heading_1' => [
                            'label' => 'Satır 1',
                            'type' => 'text',
                            'class' => 'form-control-lg',
                        ],
                    ],

                    [
                        'heading_2' => [
                            'label' => 'Satır 2',
                            'type' => 'text',
                            'class' => 'form-control-lg',
                        ],
                    ],



                    ['seperator' => 'Ana Sayfa Yazısı'],

                    [
                        'kampanya_line1' => [
                            'label' => 'Kampanya Satır 1',
                            'type' => 'text',
                            'class' => 'form-control-lg',
                        ],
                    ],

                    [
                        'kampanya_line2' => [
                            'label' => 'Kampanya Satır 2',
                            'type' => 'text',
                            'class' => 'form-control-lg',
                        ],
                    ],

                    [
                        'home_text' => [
                            'label' => 'Ana sayfa kampanya altı yazı',
                            'type' => 'text',
                            'class' => 'form-control-lg',
                        ],
                    ],

                    ['seperator' => 'Tasarım Ayarları'],

                    [
                        'lang' => [
                            'label' => 'Dil',
                            'type' => 'select',
                            'options' => [
                                'tr' => 'Türkçe',
                                'en' => 'English',
                            ]
                        ],

                        'currency' => [
                            'label' => 'Para Birimi',
                            'type' => 'select',
                            'options' => [
                                'TRY' => 'TRY',
                                'USD' => 'USD',
                            ]
                        ],

                        'theme' => [
                            'label' => 'Tasarım',
                            'type' => 'select',
                            'options' => [
                                'theme-1' => 'Tasarım 1',
                                'theme-4' => 'Tasarım 2',
                                'theme-5' => 'Tasarım 3',
                            ]
                        ],

                        'skin' => [
                            'label' => 'Renk',
                            'type' => 'select',
                            'options' => [
                                'red' => 'Kırmızı',
                                'indigo' => 'Mor',
                                'green' => 'Yeşil',
                                'blue' => 'Mavi',
                                'grey' => 'Gri',
                                'orange' => 'Turuncu',
                            ]
                        ]
                    ],

                    /* [
                        'heading_1' => [
                            'label' => '1. Satır',
                            'type' => 'text',
                            'class' => 'form-control-lg',
                        ],
                    ],

                    [
                        'heading_2' => [
                            'label' => '2. Satır',
                            'type' => 'text',
                            'class' => 'form-control-lg',
                        ],
                    ], */

                    ['seperator' => 'İletişim Ayarları'],

                    [
                        'email' => [
                            'type' => 'email',
                            'label' => 'E-Posta Adresi',
                        ],
                        'phone' => [
                            'type' => 'text',
                            'label' => 'Telefon',
                        ],
                    ],

                    [
                        'whatsapp' => [
                            'type' => 'text',
                            'label' => 'WhatsApp',
                        ],
                        'skype' => [
                            'type' => 'text',
                            'label' => 'Skype',
                        ],
                    ],

                    [
                        'facebook' => [
                            'type' => 'text',
                            'label' => 'Facebook',
                        ],
                        'instagram' => [
                            'type' => 'text',
                            'label' => 'Instagram',
                        ],
                    ],

                    [
                        'twitter' => [
                            'type' => 'text',
                            'label' => 'Twitter',
                        ],
                    ],

                    [
                        'address' => [
                            'type' => 'textarea',
                            'label' => 'Adres',
                        ],
                    ],

                    ['seperator' => 'NETGSM Ayarları'],

                    [
                        'netgsm_status' => [
                            'type' => 'select',
                            'label' => 'Durum',
                            'options' => [
                                '1' => 'Teslim edildiğinde SMS gönder',
                                '0' => 'SMM gönderme'
                            ],
                            'col' => 'col-md-2'
                        ],

                        'netgsm_header' => [
                            'type' => 'select',
                            'label' => 'Mesaj Başlığı',
                            'options' => $availableNetgsmHeaders ?? [],
                            'col' => 'col-md-2'
                        ],

                        'netgsm_message' => [
                            'type' => 'text',
                            'label' => 'Mesaj içeriği',
                            'col' => 'col-md-8'
                        ],
                    ],

                    ['seperator' => 'PAYTR Ayarları'],

                    [
                        'paytr_test_mode' => [
                            'type' => 'select',
                            'label' => 'Durum',
                            'options' => [
                                '1' => 'Test',
                                '0' => 'Canlı'
                            ]
                        ],

                        'paytr_merchant_id' => [
                            'type' => 'text',
                            'label' => 'Mağaza No (merchant_id)'
                        ],

                        'paytr_merchant_key' => [
                            'type' => 'text',
                            'label' => 'Mağaza Parola (merchant_key)',
                        ],

                        'paytr_merchant_salt' => [
                            'type' => 'text',
                            'label' => 'Mağaza Gizli Anahtar (merchant_salt)',
                        ],


                    ],

                    ['seperator' => 'Ek Yazılım Ayarları'],

                    [
                        'analytics_id' => [
                            'type' => 'text',
                            'label' => 'Google Analytics',
                            'attributes' => [
                                'placeholder' => 'UA-XXXXX-X',
                            ]
                        ],

                        'tawk_to' => [
                            'type' => 'text',
                            'label' => 'Tawk.to - Site ID',
                        ],
                    ],


                ]
            ])
            @endcomponent

        @endcomponent

    @endcomponent

    @if (isset($model))
        {{ html()->closeModelForm() }}
    @else
        {{ html()->form()->close() }}
    @endif

@endsection
