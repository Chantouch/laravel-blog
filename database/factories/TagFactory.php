<?php

use Faker\Generator as Faker;
use App\Models\Tag;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
        'description' => $faker->text
    ];
});
