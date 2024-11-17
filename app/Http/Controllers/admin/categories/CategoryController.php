<?php

namespace App\Http\Controllers\admin\categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use function Avifinfo\read;

class CategoryController extends Controller
{
   public function addForm()
   {
      $title = 'Форма добавление категорий';
      return view('admin.form.crud-category-form.add-form', compact('title'));
   }
   public function add(Request $request)
   {
      $validated = $request->validate([
         'category' => 'required|string|max:255',
      ]);

      $exists       = Category::where('name', $validated)->exists();

      if (!$exists) {
         $newCategory = $validated['category'];
         $categoryModel = new Category;
         $categoryModel->name = $newCategory;
         $categoryModel->save();
         return redirect()->back()->with('success', 'Успешное добавление');
      } else {
         return redirect()->back()->with('errors', 'Такая категория уже есть');
      }

      Category::create($newCategory);
   }

   public function formUpdate($categoryName)
   {
      $title   = 'Обновление Категории';
      return view('admin.form.crud-category-form.update-form', compact('title', 'categoryName'));
   }

   public function update(Request $request)
   {
      $validated = $request->validate([
         'category' => 'required|string|max:255',
         'oldCategory' => 'required|string|max:255'
      ]);
      $category = $validated['category'];
      $CategoryBase = Category::where('name', $validated['oldCategory'])->first();

      if ($CategoryBase) {
         $CategoryBase->name = $category;
         $CategoryBase->save();
         return redirect()->route('auth.categories')->with('success', 'Обновление прошло успешно');
      } else {
         return  redirect()->back()->with('errors', 'Пиздец нах, что-то пошло не так');
      }
   }

   public function delete(Request $request)
   {
      $validated = $request->validate([
         'category' => 'required|string|max:255',
      ]);

      $category = $validated['category'];

      // Ищем категорию по имени (если это поле "name" в базе данных)
      $categoryToDelete = Category::where('name', $category)->firstOrFail();
      $categoryToDelete->delete();

      return redirect()->route('auth.categories')->with('success', 'Категория успешно удалена.');
   }
}
