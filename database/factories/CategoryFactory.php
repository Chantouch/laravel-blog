<?php

use Faker\Generator as Faker;
use App\Models\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
        'description' => $faker->text
    ];
});
