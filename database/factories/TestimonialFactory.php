<?php

use App\Testimonial;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Testimonial::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'designation' => $faker->text,
        'statement' => $faker->text,
        'image' => $faker->name,
    ];
});
