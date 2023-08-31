<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Category::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'status' => rand(0, 1),
        'user_id' => 1,
        'name' => $name,
        'slug' => $name,
    ];
});
