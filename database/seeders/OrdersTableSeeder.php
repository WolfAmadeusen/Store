<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class OrdersTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      $region = ['Киевская область', 'Винницкая область', 'Волынская область', 'Днепропетровская область', 'Донецкая область', 'Житомирская область', 'Закарпатская область', 'Запорожская область', 'Ивано-Франковская область', 'Киевская область', 'Кировоградская область', 'Луганская область', 'Львовская область', 'Николаевская область', 'Одесская область', 'Полтавская область', 'Ровненская область', 'Сумская область', 'Тернопольская область', 'Харьковская область', 'Херсонская область', 'Хмельницкая область', 'Черкасская область', 'Черниговская область', 'Черновицкая область',];
      $name = ['Nikolass', 'Steve', 'Alex', 'Albert', 'Williems', 'Bianka Lamara', 'Александр', 'Дмитрий', 'Максим', 'Сергей', 'Андрей', 'Алексей', 'Иван', 'Михаил', 'Николай', 'Юрий', 'Олег', 'Игорь', 'Павел', 'Роман', 'Артём', 'Владислав', 'Антон', 'Евгений', 'Виктор', 'Кирилл', 'Константин', 'Валентин', 'Леонид', 'Георгий', 'Василий',];
      $surname = ['Иванов', 'Петров', 'Сидоров', 'Смирнов', 'Кузнецов', 'Попов', 'Васильев', 'Михайлов', 'Новиков', 'Фёдоров', 'Морозов', 'Волков', 'Александров', 'Лебедев', 'Козлов', 'Степанов', 'Павлов', 'Семёнов', 'Голубев', 'Виноградов', 'Богданов', 'Воробьёв', 'Филиппов', 'Медведев', 'Антонов',];
      $statuses = ['pending', 'completed', 'canceled', 'processing'];
      $strit = ['Улица будьоново', 'Улица сталина', 'Улица Ленина', 'Проулок Идиотов', 'Geretstrid Shullzentrum', 'Docheroiden Strasse'];
      $productNames = DB::table('products')->pluck('title')->toArray();
      $orders = [];


      for ($i = 1; $i <= 120; $i++) {
         $orders[] = [
            'id' => $i,
            'full_name' => $surname[array_rand($surname)] . ' ' . $name[array_rand($name)],
            'post' => $strit[array_rand($strit)] . ' ' . rand(1, 100) . '-' . chr(rand(65, 90)), // случайная улица, число и буква
            'number' => '+380' . rand(100000000, 999999999),
            'region' => $region[array_rand($region)],
            'city' => 'City ' . rand(1, 10),
            'status' => $statuses[array_rand($statuses)],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
         ];
      }
      DB::table('orders')->insert($orders);


      for ($i = 1; $i <= 120; $i++) {
         $itemCount = rand(1, 5); // количество товаров для одного заказа
         for ($j = 1; $j <= $itemCount; $j++) {
            DB::table('order_items')->insert([
               'order_id' => $i, // ID заказа
               'name' => $productNames[array_rand($productNames)], // Берем случайное имя из списка продуктов
               'quantity' => rand(1, 5),
               'price' => rand(100, 1000),
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
            ]);
         }
      }
      
   }
}
