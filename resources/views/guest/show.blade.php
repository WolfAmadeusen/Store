@extends('layouts.main')

@section('title', $product->title)

@section('content')
   <x-container>
      <div class="mt-4 container" style="display: flex; justify-content:center; gap:15px; align-items:start; flex-wrap:wrap;">
         <div class="col-lg-6">
            <div id="carouselExampleIndicators" class="carousel slide p-3 mb-5 bg-body rounded">
               <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 0"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 4"></button>
               </div>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <img src="https://via.placeholder.com/600" class="d-block w-100" alt="Image 1">
                  </div>
                  <div class="carousel-item">
                     <img src="https://via.placeholder.com/600" class="d-block w-100" alt="Image 2">
                  </div>
                  <div class="carousel-item">
                     <img src="https://via.placeholder.com/600" class="d-block w-100" alt="Image 3">
                  </div>
                  <div class="carousel-item">
                     <img src="https://via.placeholder.com/600" class="d-block w-100" alt="Image 4">
                  </div>
                  <div class="carousel-item">
                     <img src="https://via.placeholder.com/600" class="d-block w-100" alt="Image 5">
                  </div>
               </div>
               <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Предыдущий</span>
               </button>
               <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Следующий</span>
               </button>
            </div>
         </div>
   
         <div class="description col-lg-5 p-3 bg-light shadow-sm rounded">
            <h1 class="text-primary mb-3">Название: {{ $product->title }}</h1>
            <h4 class="text-secondary">Цена: {{ $product->price }}$</h4>
            <br>
            <p class="tags">
               @if ($product->categories->isEmpty())
               Нету категорий
               @else
               @foreach ($product->categories as $category)
               <a href="{{ route('category.show', $category->name) }}">{{ $category->name }}</a>
               @endforeach
               @endif
            </p>
            <strong class="d-block mb-2">Описание:</strong>
            <p>{{ $product->description }}</p>

            {{-- Форма для добавления в корзину --}}
            <form action="{{ route('guest.basket.add') }}" method="POST">
               @csrf
               <input type="hidden" name="product_id" value="{{ $product->id }}">
               <div class="form-group d-flex justify-start gap-4 mb-4">
                  <label for="quantity">Количество:</label>
                  <input type="number" height="200px" name="quantity" id="quantity" value="1" min="1">
               </div>
               <button type="submit" class="btn btn-primary">Добавить в корзину</button>
            </form>
         </div>
      </div>
      <br>
      <br>
      <br>
</x-container>

@endsection