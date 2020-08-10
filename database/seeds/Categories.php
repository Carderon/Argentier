<?php

use Illuminate\Database\Seeder;
use App\Category;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            "id" => 1,
            "name" => "Nourriture",
            "color" => "red",
            "user_id" => 1,
        ]);

        Category::create([
            "id" => 2,
            "name" => "Charges",
            "color" => "blue",
            "user_id" => 1,
        ]);
    }
}
