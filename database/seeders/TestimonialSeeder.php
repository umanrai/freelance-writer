<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Testimonial::class, 50)->create();
    }
}
