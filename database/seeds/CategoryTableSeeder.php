<?php

use App\Model\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        Category::truncate();
        
        Schema::enableForeignKeyConstraints();

	    $categories = [
            ['code' => 'Biscuits','name' => 'Biscuits', 'description' => 'Biscuits'],
            ['code' => 'Cakes','name' => 'Cakes', 'description' => 'Cakes'],
            ['code' => 'Candies And Gums','name' => 'Candies And Gums', 'description' => 'Candies And Gums'],
            ['code' => 'Chips','name' => 'Chips', 'description' => 'Chips'],
            ['code' => 'Chocolates','name' => 'Chocolates', 'description' => 'Chocolates'],
            ['code' => 'Creampastes','name' => 'Creampastes', 'description' => 'Creampastes'],
            ['code' => 'Gelatins','name' => 'Gelatins', 'description' => 'Gelatins'],
            ['code' => 'Health and Wellness','name' => 'Health and Wellness', 'description' => 'Health and Wellness'],
            ['code' => 'Nuts','name' => 'Nuts', 'description' => 'Nuts'],
            ['code' => 'Others','name' => 'Others', 'description' => 'Others'],
            ['code' => 'Premium Cookies','name' => 'Premium Cookies', 'description' => 'Premium Cookies'],
            ['code' => 'Wafers','name' => 'Wafers', 'description' => 'Wafers'],
        ];

        Category::insert($categories);
    }
}
