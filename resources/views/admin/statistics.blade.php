@extends('layouts.auth')

@section('title', 'Статистика')

@section('content')
   <h1 class="text-4xl font-bold my-10">Статистика</h1>

   <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
      <!-- Карточка 1 -->
      <div class="bg-gradient-to-br from-blue-500 to-purple-600 shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
         <div class="p-8 bg-white bg-opacity-90 rounded-lg">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Сумма товаров проданная за неделю</h3>
            <div class="text-4xl font-semibold text-gray-800 mb-6 flex items-center">
               <p class="sales-amount text-blue-700" data-amount="3949">3949</p><span class="text-lg text-gray-600">$</span>
            </div>
            <hr class="border-gray-300 mb-6">
            <div>
               <canvas class="sales-chart w-full p-6"></canvas>
            </div>
         </div>
      </div>
   
      <!-- Карточка 2 -->
      <div class="bg-gradient-to-br from-green-500 to-teal-600 shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
         <div class="p-8 bg-white bg-opacity-90 rounded-lg">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Сумма товаров проданная за месяц</h3>
            <div class="text-4xl font-semibold text-gray-800 mb-6 flex items-center">
               <p class="sales-amount text-green-700" data-amount="5000">5000</p><span class="text-lg text-gray-600">$</span>
            </div>
            <hr class="border-gray-300 mb-6">
            <div>
               <canvas class="sales-chart w-full p-6"></canvas>
            </div>
         </div>
      </div>
   
      <!-- Карточка 3 -->
      <div class="bg-gradient-to-br from-yellow-500 to-orange-600 shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
         <div class="p-8 bg-white bg-opacity-90 rounded-lg">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Самые продаваемые товары:</h3>
            <div class="text-4xl font-semibold text-gray-800 mb-6 flex items-center">
               <p class="sales-amount text-orange-700" data-amount="7500">7500</p><span class="text-lg text-gray-600">$</span>
            </div>
            <hr class="border-gray-300 mb-6">
            <div>
               <canvas class="sales-chart w-full p-6"></canvas>
            </div>
         </div>
      </div>
   </div>

   <h3 class="text-2xl font-bold my-6">График посещаемости за месяц</h3>
   <div class="flex justify-center ">
      <canvas id="visitors" class="w-full p-6"></canvas>
   </div>
   <h3 class="text-2xl font-bold my-14">Продажа товаров</h3>
   <div class="flex justify-center">
      <canvas class="w-full p6" id="sale"></canvas>
   </div>
   @push('graphics')
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      @vite(['resources/js/graphics.js'])
   @endpush
@endsection
