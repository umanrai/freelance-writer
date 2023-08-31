<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Portfolio::class, 50)->create();
    }
}
