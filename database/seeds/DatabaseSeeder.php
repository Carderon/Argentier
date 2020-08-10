<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Users::class);
        $this->call(Accounts::class);
        $this->call(Accountables::class);
        $this->call(Categories::class);
        $this->call(EntriesTableSeeder::class);
    }
}
