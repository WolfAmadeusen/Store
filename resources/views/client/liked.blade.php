@extends('layouts.auth')


@section('title', 'Понравившиеся товары')
@section('content')
<div class="container">

   @if($likedProducts->isEmpty())
      <p>У вас нет понравившихся товаров.</p>
   @else
      <section class="mb-6">
         <h2 class="text-2xl font-semibold text-gray-700 mb-4">Избранные товары</h2>
         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Пример избранного товара -->
            @foreach ($likedProducts as $product)
               <div class="bg-white p-4 rounded-lg shadow-md transition-transform transform hover:scale-105 mb-4">
                  <a href="{{ route('auth.product.show', $product->id) }}" class="block">
                     <img src="https://via.placeholder.com/150" alt="Product Image" class="w-full h-32 object-cover rounded-md mb-4">
                     <h3 class="text-lg font-semibold text-gray-800 mb-2 truncate-text">{{ $product->title }}</h3>
                  </a>
                  <div class="flex justify-between mt-4">
                     <form action="{{ route('product.like', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline">Удалить</button>
                     </form>
                  </div>
               </div>
            @endforeach
         </div>
         <br>
      </section>
   @endif
</div>
@endsection
