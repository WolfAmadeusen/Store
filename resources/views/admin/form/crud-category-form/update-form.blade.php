@extends('layouts.auth')


@section('title', $title)


@section('content')
<x-AlertMessages/>

<h1 class="text-4xl font-bold my-12 text-center text-indigo-600">{{ $title }}: {{ $categoryName }}</h1>

<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
   <div class="space-y-8">

      <!-- Обновление категории -->
      <form action="{{ route('admin.category.update', $categoryName) }}" method="POST" class="space-y-6">
         @csrf
         <input type="hidden" name="_method" value="PUT">
         <input type="hidden" name="oldCategory" value="{{ $categoryName }}">

         <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Новое название категории</label>
            <input type="text" id="category" name="category" value="{{ $categoryName }}" placeholder="Введите новое название" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
         </div>

         <div class="flex justify-center space-x-4">
            <button type="submit" class="px-6 py-2 text-white bg-indigo-600 rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Обновить категорию</button>
         </div>
      </form>

      <!-- Удаление категории -->
      <form action="{{ route('admin.category.delete', $categoryName) }}" method="POST" class="space-y-6">
         @csrf
         @method('DELETE') <!-- Это имитирует DELETE метод -->
         <input type="hidden" name="category" value="{{ $categoryName }}">
         <div class="flex justify-center space-x-4">
            <button type="submit" class="px-6 py-2 text-white bg-red-600 rounded-md shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
               Удалить категорию
            </button>
         </div>
      </form>

   </div>
</div>

@endsection