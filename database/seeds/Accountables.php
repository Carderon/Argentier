<?php

use Illuminate\Database\Seeder;

class Accountables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accountables')->insert([
            'account_id' => 1,
            'accountable_id' => 1,
            'accountable_type' => 'App\User'
       ]);
    }
}
