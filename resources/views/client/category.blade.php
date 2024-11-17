@extends('layouts.auth')


@section('title', 'Товары по категории:  '. $title)

@section('content')

   @if (empty($products))
      <h3 class="text-2xl font-bold text-gray-800 mb-7">Товаров по категории <strong> {{ $title }}</strong> не существует</h3>
   @else
      <div class="flex justify-between align-center mb-6">
         <h3 class="text-2xl font-bold text-gray-800 mb-7">Товары по категории: <strong> {{ $title }}</strong></h3>
         @if (Auth::user()->isAdmin())
            <a href="{{ route("admin.catigory.formUpdate",$category) }}" class="text-red-600 text-md">Изменить</a>
         @endif
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
         @foreach ($products as $product)
            <div class="bg-white relative border rounded-lg shadow-md overflow-hidden">
               <div class="header bg-gray-500 h-60"></div>
               <div class="p-4 border-t border-gray-300">
                  <h2 class="text-lg font-semibold">
                     <a href="{{ route('auth.product.show', $product->id) }}" target="_blank">{{ $product->title }}</a>
                  </h2>
               </div>
            </div>
         @endforeach
      </div>
   @endif
@endsection