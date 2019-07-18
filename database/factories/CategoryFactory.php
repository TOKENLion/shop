<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $price = $faker->randomFloat(2, 0, 9999);
    $rand = rand(0, 1);
    $date_offer = $price_offer = null;

    if ($rand == 0) {
        $price = 0;
    }

    if ($price !== 0 && (int)$price % 2 === 0) {
        $price_offer = $faker->randomFloat(2, 0, (int)$price);
    }

    if ($price_offer !== null) {
        $date_offer = $faker->dateTimeBetween('now', '+ 2 week');
    }

    return [
        'category_name' => $faker->unique()->company,
        'price' => $price,
        'price_offer' => $price_offer,
        'date_offer' => $date_offer,
    ];
});
