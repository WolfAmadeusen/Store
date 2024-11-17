@extends('layouts.auth')


@section('title', $product->title)

@section('content')
   <div class="pt-6">
      <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-5xl">{{ $product->title }}</h1>
      <!-- Product info -->
      <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
         <div class="lg:col-span-2">
            <!-- Картинка к товару-->
            <div class="images"><img src="https://via.placeholder.com/40" class="w-full object-cover" alt="Название товара"></div>
         </div>

         <!-- Options -->
         <div class="mt-4 lg:row-span-3 lg:mt-0">
            <h2 class="sr-only">Product information</h2>
            <p class="text-3xl tracking-tight text-gray-900">$ {{ $product->price }}</p>      

            <div class="mt-10">
               <h3 class="text-sm font-medium text-gray-900">Категории</h3>
               <div class="mt-4">
                  <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                     @if ($product->categories->isEmpty())
                        Нету категорий
                     @else
                        @foreach ($product->categories as $category)
                           <li class="text-gray-400"><a class="text-gray-500 hover:text-gray-600 hover:underline" href="{{ route('auth.product.categories', $category->name) }}">{{ $category->name }}</a></li>
                        @endforeach         
                     @endif
                  </ul>
               </div>
            </div>
            <!-- Описание  -->
            <div class="py-10 lg:col-span-2 lg:col-start-1  lg:pb-16 lg:pr-8 lg:pt-6">
               <h2 class="text-sm font-medium text-gray-900">Описание</h2>
               <div class="mt-4 space-y-6">
                  <p class="text-sm text-gray-600">{{ $product->description }}</p>
               </div>
            </div>
            @if (!Auth::user()->isAdmin())
               <div class="flex flex-col md:flex-row justify-center items-center space-y-4 md:space-y-0 md:space-x-4">
                  <!-- Кнопка "В карзину" -->
                  <form action="{{ route('user.basket.add') }}" method="POST">
                     @csrf
                     <input type="hidden" name="quantity" value="1">
                     <input type="hidden" name="product_id" value="{{ $product->id }}">
                     <button type="submit" class="md:w-80 rounded-full border border-transparent bg-indigo-600 px-10 py-3 text-base font-semibold text-white shadow-lg hover:bg-indigo-700 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-300 ease-in-out">
                     Добавить в карзину
                     </button>
                  </form>
                  <!-- Форма для кнопки "Лайк" -->
                  <form action="{{ route('product.like', $product->id) }}" method="POST" class="flex items-center">
                     @csrf
                     @if (auth()->user()->likedProducts->contains($product->id))
                        <button type="submit">
                           <x-icons.like-fill class="h-6 w-6" />
                        </button>
                     @else
                        <button type="submit">
                           <x-icons.like-heart class="h-6 w-6" />
                        </button>
                     @endif
                  </form>
               </div>
            @else
               <!-- Количество  -->
               <div class="lg:col-span-2 lg:col-start-1  lg:pb-16 lg:pr-8 lg:pt-6">
                  <div class="mt-4 flex align-center justify-start gap-4">
                     <div class="text-l text-gray-600">Количество:</div>
                     <p class="text-sm font-medium text-gray-900">{{ $product->quantity }}</p>
                  </div>
               </div>

                  
               <!-- Add to bag button -->
               <a href="{{ route('admin.goods.update.form', $product->id) }}" type="submit" class="md:w-80 rounded-full border border-transparent bg-indigo-600 px-10 py-3 text-base font-semibold text-white shadow-lg hover:bg-indigo-700 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-300 ease-in-out flex justify-center align-center gap-4">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16"> 
                     <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                     <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                  </svg>
                  Изменить
               </a>
            @endif
         </div>
      </div>
   </div>
@endsection