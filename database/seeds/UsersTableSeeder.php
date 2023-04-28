<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class)->create([
            'site_id' => 1,
            'name' => 'Volkan Baskın',
            'email' => 'baskinvolkan@gmail.com',
            'phone' => '5325610200',
            'password' => bcrypt('password'),
        ]);
    }
}
