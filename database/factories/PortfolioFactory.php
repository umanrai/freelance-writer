<?php


use App\Portfolio;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Portfolio::class, function (Faker $faker) {
    return [
        'slug' => Str::slug( $faker->name) .uniqid(),
        'description' => $faker->text,
        'url' => $faker->url,
        'title' => $faker->name,
        'type' => rand(0, 4),
        'date' => now(),
    ];
});
