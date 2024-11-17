@extends('layouts.auth')


@section('title', $title)

@section('content')
   <h1 class="text-4xl font-bold my-12 flex justify-center align-center">{{ $title }}</h1>
   <x-AlertMessages/>
   <form action="{{ route('admin.add.category') }}" method="POST" class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4 bg-white p-6 rounded-lg shadow-md">
      @csrf
      <div class="flex-1 w-full">
         <input type="text" placeholder="Название категории"  name="category"  class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-700">
      </div>
      <div class="w-full sm:w-auto">
         <button  type="submit"  class="w-full sm:w-auto inline-flex justify-center px-6 py-2 text-white bg-indigo-600 rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Добавить категорию</button>
      </div>
   </form>

@endsection