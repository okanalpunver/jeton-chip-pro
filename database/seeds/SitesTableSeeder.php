<?php

use App\Models\Site;
use App\Models\Setting;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $sites = [
            env('APP_NAME') => env('APP_DOMAIN'),
        ];

        Setting::create([
            'key' => 'buy',
            'value' => '100B - 50TL',
        ]);

        foreach ($sites as $name => $fqdn) {
            # code...
            factory(Site::class, 1)
                ->create([
                    'name' => $name,
                    'fqdn' => $fqdn,

                    'email' => 'info@' . $fqdn,
                    'phone' => '5432556933',
                    'address' => 'Merkez / Çanakkale',

                    'whatsapp' => '5432556933',
                    'skype' => 'chipmip',
                    'facebook' => 'chipmip',
                    'twitter' => 'chipmip',
                    'instagram' => 'chipmip',

                    'logo' => 'images/Xuw5alsGBkGoK5qLDjSwuFjAqlUdU4DxE1bTWiQN.png',

                    'theme' => 'theme-4',
                    'skin' => 'red',

                    'about' => "Müşteri odaklı e-pin satış sitesi chipmip.com oyun sektöründe uzun yılların deneyimiyle olumlu olumsuz tek menfaati müşteri memnuniyeti olan örnek site olarak gurur duyuyoruz.\n\nMevcut çalışma arkadaşlarımızla müşterilerimize en hızlı ve güvenilir şekilde hizmet vermekteyiz.Bulunduğumuz sektörde geçmiş yıllara dayanan deneyimimizle siz müşterilerimizin önce memnuniyeti sonra da oyun keyfini en iyi şekilde yaşamasını kendimize görev bildik  ve bunu daha iyi noktalara taşımak için oyun sektöründeki yaşanan güncel ve teknolojik sistemleri sitemize eklemek için tam zamanlı çalışmalarımızı yürütmekteyiz.\n\nSitemiz siz müşterilerimize en iyi hizmeti vermek için deneyimli çalışanlarımızla 7/24  hizmet vermektedir.\n\nMevcut olan sektörde en iyi şekilde hizmet verebilmek için gerekli tüm çalışmalarımız profesyonel ekibimiz tarafıyla hazırlanmış olup oluşabilecek tüm sorunları müşteri memnuniyetimiz için en asgari  seviyeye çekmiş bulunmaktayız.\n\nJETONCHİP.COM",

                    'heading_1' => 'Zynga Poker Chip',
                    'heading_2' => '7/24 Hızlı Sipariş Ver',

                    'paytr_merchant_id' => '135621',
                    'paytr_merchant_key' => '5u4bg8Tp8LXDPYLK',
                    'paytr_merchant_salt' => 'RC24UX4wCLHYgDEt',
                    'paytr_test_mode' => 1,
                ])
                ->each(function ($site) {
                    $site->categories()->saveMany(factory(Category::class, 1)->create([
                        'name' => 'Zynga Poker Chip',
                        'photo' => 'images/R470iJdxdwZqGpsQyqXHtrAsHI5LixHwxlgQjA2r.png',

                    ])->each(function ($category) {
                        $category->products()->save(factory(Product::class)->make([
                            'qty' => 5000,
                            'price' => 10,
                        ]));

                        $category->products()->save(factory(Product::class)->make([
                            'qty' => 10000,
                            'price' => 20,
                        ]));

                        $category->products()->save(factory(Product::class)->make([
                            'qty' => 15000,
                            'price' => 30,
                        ]));

                        $category->products()->save(factory(Product::class)->make([
                            'qty' => 20000,
                            'price' => 40,
                        ]));

                        $category->products()->save(factory(Product::class)->make([
                            'qty' => 25000,
                            'price' => 50,
                        ]));

                        $category->products()->save(factory(Product::class)->make([
                            'qty' => 30000,
                            'price' => 60,
                        ]));

                        $category->products()->save(factory(Product::class)->make([
                            'qty' => 40000,
                            'price' => 80,
                        ]));

                        $category->products()->save(factory(Product::class)->make([
                            'qty' => 50000,
                            'price' => 100,
                        ]));

                        $category->products()->save(factory(Product::class)->make([
                            'qty' => 60000,
                            'price' => 120,
                        ]));

                        $category->products()->save(factory(Product::class)->make([
                            'qty' => 70000,
                            'price' => 140,
                        ]));

                        $category->products()->save(factory(Product::class)->make([
                            'qty' => 80000,
                            'price' => 160,
                        ]));

                        $category->products()->save(factory(Product::class)->make([
                            'qty' => 90000,
                            'price' => 180,
                        ]));

                        $category->products()->save(factory(Product::class)->make([
                            'qty' => 100000,
                            'price' => 200,
                        ]));
                    }));


                    $site->bankAccounts()->createMany([
                        [
                            'name' => 'Ziraat Bankası',
                            'account_holder' => 'PAYTR ÖDEME HİZMETLERİ AŞ',
                            'branch_number' => '1333',
                            'account_number' => '62729548-5005',
                            'iban' => 'TR31 0001 0013 3362 7295 4850 05',
                            'description' => '7&24 Masrafsız Ödeme Kabul Edilir.',
                            'logo' => '/frontend/img/banks/ziraat.jpg',
                            'is_free_atm' => 1,
                        ],

                        [
                            'name' => 'Akbank',
                            'account_holder' => 'PAYTR ÖDEME HİZMETLERİ AŞ',
                            'branch_number' => '0348',
                            'account_number' => '0193433',
                            'iban' => 'TR28 0004 6001 7188 8000 1251 40',
                            'description' => '7&24 Masrafsız Ödeme Kabul Edilir.',
                            'logo' => '/frontend/img/banks/akbank.jpg',
                            'is_free_atm' => 1,
                        ],

                        [
                            'name' => 'Yapı Kredi',
                            'account_holder' => 'PAYTR ÖDEME HİZMETLERİ AŞ',
                            'branch_number' => '00203',
                            'account_number' => '43991191',
                            'iban' => 'TR57 0006 7010 0000 0043 9911 91',
                            'description' => '7&24 Masrafsız Ödeme Kabul Edilir.',
                            'logo' => '/frontend/img/banks/yapikredi.jpg',
                            'is_free_atm' => 1,
                        ],

                        [
                            'name' => 'QNB Finansbank',
                            'account_holder' => 'PAYTR ÖDEME HİZMETLERİ AŞ',
                            'branch_number' => '00937',
                            'account_number' => '57244703',
                            'iban' => 'TR79 0011 1000 0000 0057 2447 03',
                            'description' => '7&24 Masrafsız Ödeme Kabul Edilir.',
                            'logo' => '/frontend/img/banks/finansbank.jpg',
                            'is_free_atm' => 1,
                        ],

                        [
                            'name' => 'İş Bankası',
                            'account_holder' => 'PAYTR ÖDEME HİZMETLERİ AŞ',
                            'branch_number' => '3435',
                            'account_number' => '0566170',
                            'iban' => 'TR24 0006 4000 0013 4350 5661 70',
                            'description' => '7&24 Masrafsız Ödeme Kabul Edilir.',
                            'logo' => '/frontend/img/banks/is-bankasi.jpg',
                            'is_free_atm' => 1,
                        ],

                        [
                            'name' => 'Deniz Bank',
                            'account_holder' => 'PAYTR ÖDEME HİZMETLERİ AŞ',
                            'branch_number' => '3530',
                            'account_number' => '4008807-364',
                            'iban' => 'TR02 0013 4000 0040 0880 7000 20',
                            'description' => '7&24 Masrafsız Ödeme Kabul Edilir.',
                            'logo' => '/frontend/img/banks/denizbank.jpg',
                        ],

                        [
                            'name' => 'Halk Bank',
                            'account_holder' => 'PAYTR ÖDEME HİZMETLERİ AŞ',
                            'branch_number' => '430',
                            'account_number' => '10260892',
                            'iban' => 'TR73 0001 2009 4300 0010 2608 92',
                            'description' => '7&24 Masrafsız Ödeme Kabul Edilir.',
                            'logo' => '/frontend/img/banks/halkbank.jpg',
                        ],

                        [
                            'name' => 'PTT Bank',
                            'account_holder' => 'PAYTR ÖDEME HİZMETLERİ AŞ',
                            // 'branch_number' => '430',
                            'account_number' => '10093523',
                            // 'iban' => 'TR73 0001 2009 4300 0010 2608 92',
                            'description' => '7&24 Masrafsız Ödeme Kabul Edilir.',
                            'logo' => '/frontend/img/banks/ptt.jpg',
                        ],

                        [
                            'name' => 'TEB',
                            'account_holder' => 'PAYTR ÖDEME HİZMETLERİ AŞ',
                            'branch_number' => '703',
                            'account_number' => '36048881',
                            'iban' => 'TR39 0003 2000 0000 0036 0488 81',
                            'description' => '7&24 Masrafsız Ödeme Kabul Edilir.',
                            'logo' => '/frontend/img/banks/teb.jpg',
                        ],

                        [
                            'name' => 'Vakıf Bank',
                            'account_holder' => 'PAYTR ÖDEME HİZMETLERİ AŞ',
                            'branch_number' => '4',
                            'account_number' => '00158007303878358',
                            'iban' => 'TR02 0001 5001 5800 7303 8783 58',
                            'description' => '7&24 Masrafsız Ödeme Kabul Edilir.',
                            'logo' => '/frontend/img/banks/vakifbank.jpg',
                        ],
                    ]);

                    $site->testimonials()->createMany([
                        [
                            'point' => 4,
                            'name' => 'Mehmet G.',
                            'content' => 'Bir çok yerden alışveriş yaptım ilk defa bu kadar samimi ve çalışkan ilgili çalışanlar görüyorum ilginiz için teşekkür ederim.',
                        ],
                        [
                            'point' => 5,
                            'name' => 'Tamer A.',
                            'content' => 'Tavsiye üzerine geldim. Arkadaşım önermişti gerçekten anlattığı kadar var hem çok hızlılar hem de güvenilir siparişimi 10 dakika içinde teslim ettiler.',
                        ],
                        [
                            'point' => 5,
                            'name' => 'Deniz T.',
                            'content' => 'Hem ucuz hem güvenilir teşekkürler chipmip.com',
                        ],
                        [
                            'point' => 5,
                            'name' => 'Nermin S.',
                            'content' => 'Normalde yorum yapmam ama hakediyorsunuz gerçekten çok hızlı ve çalışkansınız.',
                        ],
                        [
                            'point' => 5,
                            'name' => 'Ahmet D.',
                            'content' => 'Bir çok yerden aldım.Zaman sıkıntısı çekiyorum hızlı olmasına önem veriyorum alışverişimin aradığımı  sonunda buldum teşekkürler',
                        ],
                        [
                            'point' => 5,
                            'name' => 'Can T.',
                            'content' => 'Alışveriş yapmadan önce her site gibi olduğu düşündüm ama deneyince gerçekten memnun kaldım.',
                        ],
                        [
                            'point' => 5,
                            'name' => 'Yılmaz H.',
                            'content' => 'Uygun fiyat çalışkanlık güven hepsi bir arada çok teşekkür ediyorum ilginiz için',
                        ]
                    ]);
                });
        }
        Schema::enableForeignKeyConstraints();
    }
}
