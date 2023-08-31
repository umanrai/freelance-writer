<?php

use App\Faq;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Faq::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'slug' => Str::slug( $faker->name) .uniqid(),
        'description' => $faker->text,
    ];
});
