<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        //mayusculas a la primera letra ucfirst()
        'name'=>ucfirst($faker->word),
        'description'=>$faker->sentence(10)
    ];
});
