@extends('layouts.auth')

@section('title', $title)

@section('content')

   <div class="pt-6">
      <h1 class="text-4xl font-bold tracking-tight text-gray-900">{{ $title }}</h1>
      <div class="mx-auto max-w-2xl px-4 py-6 sm:px-6 lg:max-w-7xl lg:px-8">
         <form action="{{ route('admin.goods.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
               <label for="title" class="block text-sm font-medium text-gray-700">Название</label>
               <input type="text" name="title" id="title" value="{{ old('title', $product->title) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            
            <!-- Description -->
            <div>
               <label for="description" class="block text-sm font-medium text-gray-700">Описание</label>
               <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- Price -->
            <div class="grid grid-cols-2 gap-6">
               <div>
                  <label for="price" class="block text-sm font-medium text-gray-700">Цена ($)</label>
                  <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
               </div>
               <div>
                  <label for="quantity" class="block text-sm font-medium text-gray-700">Количество</label>
                  <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $product->quantity) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
               </div>
            </div>

            <!-- Categories -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
               @foreach ($categories as $category)
                  <label class="flex items-center space-x-2">
                     <input 
                        type="checkbox" 
                        name="categories[]" 
                        value="{{ $category->id }}" 
                        class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                        @if($product->categories->contains($category->id)) checked @endif
                     >
                     <span class="text-sm text-gray-700">{{ $category->name }}</span>
                  </label>
               @endforeach
            </div>
            
            @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
            @endif
            
            <!-- Submit Button -->
            <div class="mt-10">
               <button type="submit" class="w-full sm:w-auto inline-flex justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                  Сохранить изменения
               </button>
            </div>

         </form>
      </div>
   </div>
@endsection
