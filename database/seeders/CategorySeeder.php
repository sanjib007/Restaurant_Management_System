<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryDefinitions = [
            ['name' => 'Burgers', 'description' => 'Delicious grilled and stacked burgers', 'image' => 'category1.jpg'],
            ['name' => 'Pizzas', 'description' => 'Hot, cheesy pizzas with fresh toppings', 'image' => 'category2.jpg'],
            ['name' => 'Salads', 'description' => 'Fresh salads made with crisp greens', 'image' => 'category3.jpg'],
            ['name' => 'Sandwiches', 'description' => 'Handheld sandwiches and wraps', 'image' => 'category4.jpg'],
            ['name' => 'Pasta', 'description' => 'Creamy and saucy pasta dishes', 'image' => 'category5.jpg'],
            ['name' => 'Soups', 'description' => 'Warm soups cooked to comfort', 'image' => 'category6.jpg'],
            ['name' => 'Seafood', 'description' => 'Fresh seafood plates and grills', 'image' => 'category7.jpg'],
            ['name' => 'Desserts', 'description' => 'Sweet desserts and pastries', 'image' => 'category8.jpg'],
            ['name' => 'Drinks', 'description' => 'Cold and hot beverages', 'image' => 'category9.jpg'],
            ['name' => 'Snacks', 'description' => 'Tasty quick bites and starters', 'image' => 'category10.jpg'],
        ];

        foreach ($categoryDefinitions as $index => $cat) {
            DB::table('categories')->updateOrInsert(
                ['category_name' => $cat['name']],
                [
                    'category_description' => $cat['description'],
                    'category_image' => $cat['image'],
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }
}
