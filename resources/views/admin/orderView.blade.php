@extends('layouts.auth')

@section('title', 'Просмотр заказа')
@section('content')
<div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
         <div class="p-6 text-gray-900">
            <h2 class="text-2xl font-semibold mb-6 border-b pb-2">Просмотр заказа</h2>

            <div class="mb-4">
               <h3 class="text-lg font-medium text-gray-800">Область доставки:</h3>
               <p class="text-gray-700 bg-gray-100 p-3 rounded-lg">{{ $order->region }}</p>
            </div>

            <div class="mb-4">
               <h3 class="text-lg font-medium text-gray-800">Город:</h3>
               <p class="text-gray-700 bg-gray-100 p-3 rounded-lg">{{ $order->city }}</p>
            </div>

            <div class="mb-4">
               <h3 class="text-lg font-medium text-gray-800">Номер телефона:</h3>
               <p class="text-gray-700 bg-gray-100 p-3 rounded-lg">{{ $order->number }}</p>
            </div>

            <div class="mb-4">
               <h3 class="text-lg font-medium text-gray-800">Почта:</h3>
               <p class="text-gray-700 bg-gray-100 p-3 rounded-lg">{{ $order->post }}</p>
            </div>

            <div class="mb-6">
               <h3 class="text-lg font-medium text-gray-800">Полное имя пользователя:</h3>
               <p class="text-gray-700 bg-gray-100 p-3 rounded-lg">{{ $order->full_name }}</p>
            </div>
         
            @foreach ($order->items as $item)
               <div class="flex justify-between mb-6 border-b pb-4 gap-10">
                  <div class="w-1/3">
                     <h3 class="text-lg font-medium text-gray-800">Название товара:</h3>
                     <p class="text-gray-700 bg-gray-100 p-3 rounded-lg">{{ $item->name }}</p> <!-- Название товара -->
                  </div>
                  <div class="w-1/3">
                     <h3 class="text-lg font-medium text-gray-800">Количество:</h3>
                     <p class="text-gray-700 bg-gray-100 p-3 rounded-lg">{{ $item->quantity }}</p> <!-- Количество -->
                  </div>
                  <div class="w-1/3">
                     <h3 class="text-lg font-medium text-gray-800">Цена:</h3>
                     <p class="text-gray-700 bg-gray-100 p-3 rounded-lg">{{ $item->price }}$</p> <!-- Цена товара -->
                  </div>
               </div>
            @endforeach
            
            <!-- Проверка если эти заказы в процессе или в ожидании -->
            @if ($order->status =='pending' ||$order->status =='processing')
               <form action="{{ route('admin.order.update', $order->id) }}" method="POST" class="mt-4">
                  @csrf
                  @method('PUT')
                  <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg">Оформить заказ</button>
               </form>
            @endif

            <!-- Заказ отменён -->
            @if ($order->status =='canceled')
               <div class="flex justify-center mt-6">
                  <div class="bg-red-500 text-white px-6 py-3 rounded-lg shadow-md">
                     Этот заказ отменён
                  </div>
               </div>
            @endif
            
            <!-- Заказ уже оформлен -->
            @if ($order->status =='completed')
               <div class="flex justify-center mt-6">
                  <div class="flex justify-center bg-green-500 text-white px-6 py-3 rounded-lg shadow-md">
                     <p>Этот заказ уже оформлен</p>
                  </div>
               </div>
            @endif

         </div>
      </div>
   </div>
</div>

@endsection
