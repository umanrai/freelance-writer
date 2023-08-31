<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Feature::class, 50)->create();
    }
}
