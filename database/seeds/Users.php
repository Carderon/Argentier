<?php

use Illuminate\Database\Seeder;

use App\User;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "administrateur",
            "email" => "admin@argentier.be",
            "password" => bcrypt("azerty")
        ]);
    }
}
