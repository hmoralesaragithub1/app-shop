<?php

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        /*buscar todos los metodos de faker
        en github fzaninotto faker*/

        'name'=>substr($faker->sentence(3),0,-1),
        'description'=>$faker->sentence(10),
        'long_description'=>$faker->text,
        'price'=>$faker->randomFloat(2,5,1000),
        'category_id'=>$faker->numberBetween(1,5)
    ];
});
