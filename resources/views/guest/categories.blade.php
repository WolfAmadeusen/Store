@extends('layouts.main')

@section('title','Категории')


@section('content')
   <h1 class="title">Категории</h1>
   <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
      @foreach ($categories as $category)
         <div class="col text-center">
            <a  href="{{ route('category.show', $category) }}">
               <x-card>
                  <img src="https://via.placeholder.com/40" class="card-img-top" alt="Название товара">
                  <h5><a class="text-body-emphasis text-decoration-none" href="{{ route("category.show",$category) }}" target="_blank">{{ $category}}</a></h5>
               </x-card>
            </a>
         </div>
         <br>
      @endforeach
   </div>
   <br><br>
   
@endsection