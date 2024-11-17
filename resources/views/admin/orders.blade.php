@extends('layouts.auth')


@section('title', 'Заказы')

@section('content')
   <x-AlertMessages/>
   <div class="my-8">
      <div class="flex flex-col md:flex-row justify-between items-center">
         <h2 class="text-4xl font-bold text-gray-700 mb-4">Все заказы</h2>
         <div class="flex items-center space-x-4">
            <div class="search">
               <svg x="0px" y="0px" viewBox="0 0 24 24" width="20px" height="20px">
                  <g stroke-linecap="square" stroke-linejoin="miter" stroke="currentColor">
                     <line fill="none" stroke-miterlimit="10" x1="22" y1="22" x2="16.4" y2="16.4" />
                     <circle fill="none" stroke="currentColor" stroke-miterlimit="10" cx="10" cy="10" r="9" />
                  </g>
               </svg>
               <div>
                  <input type="text" placeholder="Найти заказ" class="search-input">
               </div>
            </div>
         </div>
      </div>

      <div class="flex space-x-4 mb-4">
         <a href="{{ route('admin.orders.list') }}" class="px-4 py-2 rounded {{ $status === 'all' ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">Все</a>
         <a href="{{ route('admin.orders.list', 'completed') }}" class="px-4 py-2 rounded {{ $status === 'completed' ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">Завершенные</a>
         <a href="{{ route('admin.orders.list', 'pending') }}" class="px-4 py-2 rounded {{ $status === 'pending' ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">В процессе</a>
         <a href="{{ route('admin.orders.list', 'canceled') }}" class="px-4 py-2 rounded {{ $status === 'canceled' ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">Отменённый заказ</a>
      </div>

      <div class="my-12">
         {{ $orders->links('vendor.pagination.tailwind') }}
      </div>
      <div class="overflow-x-auto my-6">
         <table class="min-w-full bg-white border border-gray-300 shadow-lg rounded-lg">
            <thead>
               <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                  <th class="py-3 px-6 text-left">ID</th>
                  <th class="py-3 px-6 text-left">Имя</th>
                  <th class="py-3 px-6 text-left">Товар</th>
                  <th class="py-3 px-6 text-left">Цены</th>
                  <th class="py-3 px-6 text-left">Количество</th>
                  <th class="py-3 px-6 text-left">Номер телефона</th>
                  <th class="py-3 px-6 text-left">Город и адрес</th>
                  <th class="py-3 px-6 text-left">Действия</th>
               </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
               @foreach ($orders as $order)
                  @foreach ($order->items as $item)
                     @if ($item->status !== 'completed')
                        <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-300">
                           <td class="py-3 px-6">{{ $order->id }}</td>
                           <td class="py-3 px-6">{{ $order->full_name }}</td>
                           <td class="py-3 px-6">{{ $item->name }}</td>
                           <td class="py-3 px-6">{{ $item->price }}$</td>
                           <td class="py-3 px-6">{{ $item->quantity }}</td>
                           <td class="py-3 px-6">{{ $order->number }}</td>
                           <td class="py-3 px-6">{{ $order->city }} ({{ $order->region }})</td>
                           <td class="py-3 px-6">
                              <a href="{{ route('admin.product.show', $order->id) }}" class="bg-blue-500 text-white font-semibold py-1 px-3 rounded-lg hover:bg-blue-600 transition duration-200 flex items-center">
                                 Просмотреть
                              </a>
                           </td>
                        </tr>
                     @endif
                  @endforeach
               @endforeach
            </tbody>  
         </table>
      </div>
   </div>
   <div class="my-12">
      {{ $orders->links('vendor.pagination.tailwind') }}
   </div>
   @push('basket')
      @vite(['resources/css/search.css'])
      @vite(['resources/js/search.js'])
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   @endpush
@endsection