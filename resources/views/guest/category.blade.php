@extends('layouts.main')

@section('title', 'Товары по категории:  ' . $title)


@section('content')
   <h1 class="title">Товары по категории: {{ $title }}</h1>
   <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
      @if (empty($products))
        <p>Товаров с такими категориями нету</p>
     @else
        @foreach ($products as $product)
         <div class="col text-center">
          <a href="{{ route('guest.product.show', $product->id) }}">
            <x-card>
            <div class="header bg-secondary" style="height: 15rem;"></div>
            <h5><a class="text-body-emphasis text-decoration-none"
               href="{{ route('guest.product.show', $product->id) }}" target="_blank">{{ $product->title }}</a></h5>
            <br>
            <div style="position: absolute; top:10px; right:10px;">
               <a href="#" class="nav-link text-secondary btn">
               <i class="bi bi-heart" style="font-size: 25px"></i>
               </a>
            </div><br>
            <div style="position: absolute; bottom:10px; left:20px;">
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
     @endif
   </div>
   <br>
   <br>
   <br>
@endsection