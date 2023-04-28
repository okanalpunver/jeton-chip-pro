<?php

namespace App\Repositories;

use App\Models\Site;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SiteCreatorRepository extends Seeder
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
        $this->data['status'] = 1; //$data['status'] ?? 0;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        factory(Site::class, 1)
            ->create($this->data)
            ->each(function ($site) {
                $site->categories()
                    ->saveMany(factory(Category::class, 1)->create([
                        'name' => 'Zynga Poker Chip'
                    ])
                        ->each(function ($category) {
                            $category->products()->save(factory(Product::class)->make([
                                'qty' => 5000,
                                'price' => 10,
                            ]));

                            $category->products()->save(factory(Product::class)->make([
                                'qty' => 10000,
                                'price' => 20,
                            ]));

                            $category->products()->save(factory(Product::class)->make([
                                'qty' => 55000,
                                'price' => 100,
                            ]));
                        }));

                $site->bankAccounts()->createMany([
                    [
                        'name' => 'Ziraat Bankası',
                        'account_holder' => 'PAYTR ÖDEME HİZMETLERİ AŞ',
                        'branch_number' => '1333',
                        'account_number' => '262729548-5005',
                        'iban' => 'TR310001001333627295485005',
                        'description' => '7&24 Masrafsız Ödeme Kabul Edilir.',
                    ],

                    [
                        'name' => 'Garanti Bankası',
                        'account_holder' => 'PAYTR ÖDEME HİZMETLERİ AŞ',
                        'branch_number' => '1333',
                        'account_number' => '262729548-5005',
                        'iban' => 'TR310001001333627295485005',
                        'description' => '7&24 Masrafsız Ödeme Kabul Edilir.',
                    ],

                    [
                        'name' => 'Yapı Kredi',
                        'account_holder' => 'PAYTR ÖDEME HİZMETLERİ AŞ',
                        'branch_number' => '1333',
                        'account_number' => '262729548-5005',
                        'iban' => 'TR310001001333627295485005',
                        'description' => '7&24 Masrafsız Ödeme Kabul Edilir.',
                    ],

                    [
                        'name' => 'Vakıf Bank',
                        'account_holder' => 'PAYTR ÖDEME HİZMETLERİ AŞ',
                        'branch_number' => '1333',
                        'account_number' => '262729548-5005',
                        'iban' => 'TR310001001333627295485005',
                        'description' => '7&24 Masrafsız Ödeme Kabul Edilir.',
                    ],
                ]);
            });

        Schema::enableForeignKeyConstraints();
    }
}
