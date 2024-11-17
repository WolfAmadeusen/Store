<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Sales;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
   public function add(Request $request)
   {
      $request->validate([
         'product_id' => 'required|exists:products,id',
         'quantity' => 'required|integer|min:1',
      ]);

      $product = Product::find($request->product_id);
      $quantity = $request->quantity;

      $basket = session()->get('basket', []);

      if (isset($basket[$product->id])) {
         $basket[$product->id]['quantity'] += $quantity;
      } else {
         $basket[$product->id] = [
            'product_id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => $quantity,
         ];
      }

      session(['basket' => $basket]);

      return redirect()->back();
   }

   public function show()
   {
      $basket = session()->get('basket', []);
      $products = Product::whereIn('id', array_keys($basket))->get();

      $view = Auth::check() ? 'client.basket' : 'guest.basket';

      return view($view, compact('basket'), compact('products'));
   }
   public function updateQuantity(Request $request, $quantity)
   {
      $request->validate([
         'quantity' => 'required|integer|min:1',
      ]);

      $basket = session()->get('basket', []);

      // Проверяем, есть ли товар в корзине
      if (isset($basket[$quantity])) {

         // Обновляем количество товара
         $basket[$quantity]['quantity'] = $request->quantity;
         session(['basket' => $basket]);
      }

      return redirect()->back();
   }


   public function order(Request $request)
   {
      // Получение данных
      $basket = session()->get('basket', []);

      // Добавление товара в таблицу orders
      $user_id = Auth::check() ? Auth::id() : null;

      // Проверка есть ли такой пользователь или нет и добавление в заказ
      if ($user_id) {
         $order = Order::create([
            'user_id'   => $user_id,
            'full_name' => Auth::user()->FIO,
            'post'      => Auth::user()->email,
            'number'    => Auth::user()->number,
            'region'    => Auth::user()->region,
            'city'      => Auth::user()->city,
         ]);
      } else {
         $order = Order::create([
            'user_id'   => $user_id,
            'full_name' => $request->input('full_name'),
            'post'      => $request->input('post'),
            'number'    => $request->input('number_phone'),
            'region'    => $request->input('region'),
            'city'      => $request->input('city'),
         ]);
      }

      //Запись заказа
      foreach ($basket as $item) {
         $order->items()->create([
            'name' => $item['name'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
         ]);
      }
      session()->forget('basket');
      return redirect()->back()->with('message', 'Заказ успешно создан!');
   }


   public function removeFromBasket($productId)
   {
      $basket = session()->get('basket', []);

      if (isset($basket[$productId])) {
         unset($basket[$productId]);
         session(['basket' => $basket]);
      }
      response()->json(['basket' => $basket, 'status' => 'success']);
      return redirect()->back();
   }
}
