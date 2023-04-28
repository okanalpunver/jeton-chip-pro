<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Site;
use Faker\Generator as Faker;

$factory->define(Site::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'fqdn' => $faker->domainName,
        'status' => true,
    ];
});
