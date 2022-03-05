<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Service::class, function (Faker $faker) {
    return [
        'icon' => $faker->name,
        'title' => $faker->name,
        'summary' => $faker->text,
        'description' => $faker->text,
        'slug' => Str::slug( $faker->name) .uniqid(),

    ];
});
