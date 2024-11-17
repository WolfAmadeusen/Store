@extends('layouts.main')

@section('title', 'Главная страница')

@section('content')

<x-row>
   <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
      @foreach ($products as $product)
         <div class="col text-center">
            <a href="{{ route('guest.product.show', $product->id) }}">
               <x-card>
                  <img src="https://via.placeholder.com/150" class="card-img-top" alt="{{ $product->title }}">
                  <h5>
                     <a class="text-body-emphasis text-decoration-none" href="{{ route('guest.product.show', $product->id) }}" target="_blank">
                        {{ $product->title }}
                     </a>
                  </h5>
                  <div style="position: relative; bottom: 10px; right: -80px;" class="my-2">                 
                     {{-- Форма для добавления в корзину --}}
                     <form action="{{ route('guest.basket.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary">
                           Добавить <i class="bi bi-basket"></i> <!-- Замените на вашу иконку -->
                        </button>
                     </form>
                  </div>
               </x-card>
            </a>
         </div>
      @endforeach
   </div>
</x-row>

   <br>
   <div class="mb-3 mt-3">
      {{ $products->links('pagination::bootstrap-4') }}
   </div>
   <br>
   <br>
   <br>
</div> 
@endsection 