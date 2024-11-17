<?php

namespace App\Http\Controllers\admin\goods;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
   public function goods()
   {
      $goods = DB::table('products')->paginate(50);

      return view('admin.goodsList', compact('goods'));
   }

   public function formUpdate(Request $request, $product_id)
   {
      $title = 'Изменение товара';
      $categories = Category::all(); // Получаем все категории
      $product = Product::with('categories')->findOrFail($product_id);
      return view('admin.form.crud-product-form.form-update', compact('product', 'categories', 'title'));
   }

   public function update(Request $request, $product)
   {
      $validated = $request->validate([
         'title' => ['required', 'string'],
         'description' => ['required', 'string'],
         'price' => ['required', 'numeric'],
         'quantity' => ['required', 'integer'],
         'categories' => ['required', 'array']
      ]);
      // Найдите продукт, который хотите обновить
      $product = Product::find($product);

      if ($product) {
         // Обновите основные данные продукта
         $product->title = $validated['title'];
         $product->description = $validated['description'];
         $product->price = $validated['price'];
         $product->quantity = $validated['quantity'];
         $product->save();

         // Обновите связи с категориями
         $product->categories()->sync($validated['categories']);

         return redirect()->route('admin.goods.list')->with('success', 'Успешное обновление');
      }
   }

   public function addForm()
   {
      $title = 'Добавление нового товара';
      $categories = Category::all();
      return view('admin.form.crud-product-form.form-add-product', compact('title', 'categories'));
   }

   public function add(Request $request)
   {
      $validated = $request->validate([
         "title" => 'required|string|max:255',
         "description" => 'required|string',
         "price" => 'required|numeric',
         "quantity" => 'required|integer',
         "categories" => 'required|exists:categories,id',
      ]);

      $product = Product::create([
         'title' => $validated['title'],
         'description' => $validated['description'],
         'price' => $validated['price'],
         'quantity' => $validated['quantity'],
      ]);
      
      if (!empty($validated['categories'])) {
         $product->categories()->sync($validated['categories']);
      }

      return redirect()->route('admin.goods.list')->with('success', 'Товар успешно добавлен');
   }

   public function productDelete($id)
   {
      // Ищем категорию по id и удаляет его
      $productToDelete = Product::find($id);
      $productToDelete->delete();
      return redirect()->route('admin.goods.list')->with('success', 'Товар успешно удален.');
   }
}
