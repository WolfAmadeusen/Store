@extends('layouts.auth')

@section('title','Корзина')


@section('content')
   @if ($basket_responce == null || session('message'))
      @if (session('message'))
         <p>{{ session('message') }}</p>
      @else
         <p>Корзина пуста.</p>
      @endif
   @else
      <div class="container mx-auto p-10">
         <h1 class="text-3xl font-bold ">Корзина</h1>
         <div class="mt-8 border-t border-gray-300">
            <div class="mt-8">
               <ul role="list">
                  @foreach ($basket_responce as $item)
                  <li class="shadow p-4 grid gap-4 md:grid-cols-[auto_1fr_auto] items-center">
                     <div class="shadow-md mr-4 border p-4">
                        <img src="https://via.placeholder.com/40" class="h-36 w-full md:h-40 md:w-40 object-cover rounded-md" alt="Название товара">
                     </div>
                     <div class="flex flex-col gap-4">
                        <h3 class="text-xl"><a href="{{ route('auth.product.show', $item['product_id']) }}">{{ $item['name'] }}</a></h3>
                        <strong>{{ $item['price'] }} $</strong>
                        <form action="{{ route('user.basket.update.quantity', $item['product_id']) }}" method="post" class="flex gap-2 items-center">
                           @csrf
                           <input type="number" name="quantity" value="{{ $item['quantity'] }}" class="w-20 p-2 border border-gray-300 rounded-md">
                           <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">Сохранить</button>
                        </form>
                     </div>
                     <div>
                        <form action="{{ route('user.basket.remove', $item['product_id']) }}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="text-red-500 hover:text-red-700 transition">Удалить</button>
                        </form>
                     </div>
                  </li><br><br>         
                  @endforeach
               </ul>
               <h3 class="text-2xl font-mono">Полная стоимость: {{ $total_price }}$</h3><br><br>
               <form action="{{ route('user.basket.order') }}" method="post">
                  @csrf
                  <button type="submit" class="px-8 py-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">Заказать</button>
               </form>
            </div>
         </div>
      </div>
   @endif
@endsection