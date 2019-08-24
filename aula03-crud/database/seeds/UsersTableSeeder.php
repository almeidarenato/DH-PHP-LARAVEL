<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Abirosvaldo",
            "email" => "abirosvaldo@gmail.com",
            "password" => bcrypt("12345")
        ]);

        User::create([
            "name" => "teste",
            "email" => "teste@gmail.com",
            "password" => bcrypt("12345")
        ]);
    }
}
