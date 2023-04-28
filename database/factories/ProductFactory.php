<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'qty' => $faker->randomElement([5000, 10000, 20000, 30000, 40000, 50000]),
        'price' => $faker->numberBetween(1, 5),
    ];
});
