@extends('layouts.auth')
@section('title','Категории')

@section('content')

   <x-AlertMessages/>
   <div class="flex justify-between align-center mb-6">
      <h3 class="text-2xl font-bold text-gray-800 mb-7">Категории товаров</h3>
      @if (auth()->user()->isAdmin())
         <a href="{{ route('category.add.form') }}" class="text-blue-600 text-md">Добавить категорию</a>
      @endif
   </div>
   <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      @foreach ($categories as $category)
         <div class="bg-white relative border rounded-lg shadow-md overflow-hidden">
            <a  href="{{ route('auth.product.categories', $category) }}">
               <div class="bg-green-700 h-60 transition-transform duration-300 group-hover:scale-110"></div>
               <div class="p-6 border-t border-gray-300">
                  <h2 class="text-lg font-semibold truncate-text"><a href="{{ route("auth.product.categories",$category) }}" target="_blank">{{ $category}}</a></h2>
               </div>
            </a>
         </div>
      @endforeach
   </div>

@endsection