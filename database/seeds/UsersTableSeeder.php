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
            'email' => 'root@fw.com',
        ],[
            'first_name' => 'Uman',
            'last_name' => 'Rai',
            'email' => 'root@fw.com',
            'phone' => '1234567890',
            'password' => bcrypt('secret'),
        ]);

        factory(User::class, 2)->create();
    }
}
