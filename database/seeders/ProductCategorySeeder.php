<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
   public function run()
   {
      // Создаем 10 категорий
      $categories = Category::factory()->count(10)->create();
      // Создаем 150 товаров
      $products = Product::factory()->count(300)->create();

      foreach ($products as $product) {
         $product->categories()->attach(
            $categories->random(rand(1, 3))->pluck('id')->toArray(),
            [
               'created_at' => Carbon::now()->subDays(rand(0, 30)),
               'updated_at' => Carbon::now(),
            ]
         );
      }
   }
}
