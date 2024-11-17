<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
   public function index()
   {
      // Персональные данные
      $name    = Auth::user()->name;
      $FIO     = Auth::user()->FIO;
      $number  = Auth::user()->number;
      $city    = Auth::user()->city;
      $region  = Auth::user()->region;
      $email   = Auth::user()->email;

      $user = User::query()
         ->where('name', $name)
         ->where('FIO', $FIO)
         ->where('number', $number)
         ->where('city', $city)
         ->where('region', $region)
         ->where('email', $email)
         ->get();

      //Понравившиеся товары
      $likedProducts = Auth::user()->likedProducts()->limit(4)->get();

      //Товары которые в корзине
      $basketProduct = session()->get('basket', []);

      return view('dashboard', compact('basketProduct', 'user', 'likedProducts'));
   }

   public function basket(Request $request)
   {
      $user = $request->user();
      $basket_responce = session()->get('basket', []);
      if (!empty($basket_responce)) {
         foreach ($basket_responce as $item) {
            $total_price = array_sum(array_map(function ($item) {
               return $item['price'] * $item['quantity'];
            }, $basket_responce));
         }
         return view('client.basket', compact('basket_responce'), compact('total_price'));
      } else {
         // Передайте данные в представление
         return view('client.basket', compact('basket_responce'));
      }
   }

   public function like(Request $request, Product $product)
   {
      $user = auth()->user();
      if ($user->likedProducts()->where('product_id', $product->id)->exists()) {
         $user->likedProducts()->detach($product);
      } else {
         $user->likedProducts()->attach($product);
      }

      return redirect()->back();
   }

   public function liked()
   {
      $user = auth()->user();
      $likedProducts = $user->likedProducts;

      return view('client.liked', compact('likedProducts'));
   }
}
