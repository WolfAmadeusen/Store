<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   public function index(Request $request)
   {
      $products = Product::with('categories')->paginate(28);
      $view = Auth::check() ? 'client.home' : 'guest.index';
      return view($view, compact('products'));
   }

   public function show($id)
   {
      $product = Product::where('id', $id)->first();

      $view = Auth::check() ? 'client.show' : 'guest.show';
      return view($view, compact('product'));
   }

   public function categorieslist()
   {
      $categories = DB::table('categories')->pluck("name");

      $view = Auth::check() ? 'client.categories':'guest.categories';
      return view($view, compact('categories'));
   }

   public function category($category)
   {
      $title = $category;
      $products = Product::whereHas('categories', function ($query) use ($category) {
         $query->where('name', $category);
      })->get();

      $view = Auth::check() ? 'client.category':'guest.category';
      return view($view, compact('products', 'title', 'category'));
   }
}
