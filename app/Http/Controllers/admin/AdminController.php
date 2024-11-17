<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
   public function index()
   {
      //Берём подукты(первые 3)/заказы(первые 5)/категории(Все)
      $products   = Product::with('categories')->limit(3)->get();
      $categories = DB::table('categories')->pluck('name');
      $orders = Order::with(['items' => function ($query) {
         $query->limit(6);
      }])->limit(5)->get();

      return view('dashboard', compact('products', 'categories', 'orders'));
   }
   public function orders($status = 'all')
   {
      $orders = Order::query();

      if ($status === 'completed') {
         $orders->where('status', 'completed');
      } elseif ($status === 'pending') {
         $orders->where('status', 'pending');
      } elseif ($status === 'canceled') {
         $orders->where('status', 'canceled');
      }

      $orders = $orders->paginate(30);
      return view('admin.orders', compact('orders', 'status'));
   }

   public function show($product_id)
   {
      $order = Order::with('items')->where('id', $product_id)->first();
      $order->items = $order->items->unique('id');
      return view('admin.orderView', compact('order'));
   }

   public function UpdateOrderStatus(Request $request, $product_id)
   {
      $order = Order::find($product_id);
      if (!$order) {
         return redirect()->route('admin.orders.list')->with('error', 'Заказ не найден');
      }

      $order->status ='completed';
      $order->save();
      return redirect()->route('admin.orders.list')->with('success', 'Заказ оформлен');
   }
}
