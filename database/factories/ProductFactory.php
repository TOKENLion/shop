<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $user = App\User::inRandomOrder()->first();
    $category = App\Category::inRandomOrder()->first();

    $price = $faker->randomFloat(2, 0, 9999);
    $date_offer = $price_offer = null;

    if (!empty($category->price) && (int)$category->price !== 0) {
        $price = $category->price;
    }

    if (!empty($category->price_offer)) {
        $price_offer = $category->price_offer;
        $date_offer = $category->date_offer;
    } else {
        if ((int)$price % 2 === 0) {
            $price_offer = $faker->randomFloat(2, 0, (int)$price);
        }

        if ($price_offer !== null) {
            $date_offer = $faker->dateTimeBetween('now', '+ 2 week');
        }
    }

    return [
        'user_id' => $user->id,
        'category_id' => $category->id,
        'product_name' => $faker->unique()->userName,
        'price' => $price,
        'price_offer' => $price_offer,
        'date_offer' => $date_offer
    ];
});
