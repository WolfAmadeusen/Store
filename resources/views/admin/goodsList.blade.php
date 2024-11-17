@extends('layouts.auth')


@section('title','Информация про товары')


@section('content')
   <x-AlertMessages/>
   <div class="flex justify-between items-center flex-wrap">
      <h1 class="text-4xl font-semibold text-gray-800 mb-4 mt-0 w-full sm:w-auto">
         Информация про товары
      </h1>
      <a href="{{ route('admin.product.addForm') }}" class="inline-block text-xl font-medium bg-green-600 text-white py-3 px-8 rounded-lg shadow-lg hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 transition duration-300 ease-in-out transform hover:scale-105 w-full sm:w-auto">
         Добавить товар
      </a>
   </div>
   
   
   <div class="my-12">
      {{ $goods->links('vendor.pagination.tailwind') }}
   </div>
   <div class="overflow-x-auto my-6">
      <table class="min-w-full bg-white border border-gray-300 shadow-lg rounded-lg">
         <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
               <th class="py-3 px-6 text-left">ID</th>
               <th class="py-3 px-6 text-left">Название</th>
               <th class="py-3 px-6 text-left">Цена</th>
               <th class="py-3 px-6 text-left">Количество</th>
               <th class="py-3 px-6 text-left">Дата публикации</е>
               <th class="py-3 px-6 text-left">Действия</th>
            </tr>
         </thead>
         <tbody class="text-gray-600 text-sm font-light">
            @foreach ($goods as $product)
               <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-300">
                  <td class="py-3 px-6">{{ $product->id }}</td>
                  <td class="py-3 px-6">{{ $product->title }}</td>
                  <td class="py-3 px-6">{{ $product->price}}</td>
                  <td class="py-3 px-6">{{ $product->quantity}}</td>
                  <td class="py-3 px-6">{{ $product->created_at }}</td>
                  <td class="py-3 px-6">
                     <a href="{{ route('auth.product.show', $product->id)}}" class="bg-blue-500 text-white font-semibold py-1 px-4 rounded-lg hover:bg-blue-600 transition duration-200">Просмотреть</a>
                     <a href="{{ route('admin.delete.product', $product->id) }}" rel="noopener noreferrer" class="bg-red-500 text-white font-semibold py-1 px-4 rounded-lg hover:red-blue-600 transition duration-200 m-4">Удалить</a>
                  </td>
               </tr>
            @endforeach
         </tbody>  
      </table>
   </div>
   <div class="my-12">
      {{ $goods->links('vendor.pagination.tailwind') }}
   </div>
@endsection