<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = DB::table('categories')->pluck('id','category_name')->toArray();

        $categoryNames = array_keys($categories);

        foreach ($categoryNames as $catIndex => $name) {
            $catId = $categories[$name];
            $catIndex++;

            for ($i = 1; $i <= 20; $i++) {
                $itemName = "{$name} Item {$i}";
                $itemImage = "c{$catIndex}_i{$i}.jpg";
                $price = rand(199, 1999) / 100;

                DB::table('items')->updateOrInsert(
                    ['item_name' => $itemName],
                    [
                        'item_description' => "Cooked {$name} dish number {$i}",
                        'item_image' => $itemImage,
                        'category_id' => $catId,
                        'item_price' => $price,
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]
                );
            }
        }
    }
}
