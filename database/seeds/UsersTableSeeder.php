<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'email' => env('ROOT_EMAIL', 'root@fw.com'),
        ],[
            'first_name' => 'Freelance',
            'last_name' => 'Writer',
            'email' => env('ROOT_EMAIL', 'root@fw.com'),
            'phone' => '1234567890',
            'password' => bcrypt(env('ROOT_PASSWORD', 'secret')),
        ]);

        factory(User::class, 2)->create();
    }
}
