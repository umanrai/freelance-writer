<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Feature;
use Faker\Generator as Faker;

$factory->define(Feature::class, function (Faker $faker) {
    return [
        'icon' => $faker->name,
        'title' => $faker->name,
        'summary' => $faker->text,
        'description' => $faker->text,
        'slug' => Str::slug( $faker->name) .uniqid(),
    ];
});
