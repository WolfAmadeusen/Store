@section('title', 'Главная страница')

@extends('layouts.auth')

@section('content')
   <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      @foreach($products as $product)
         <div class="bg-white relative border rounded-lg shadow-md overflow-hidden">
            <a href="{{ route('auth.product.show', $product->id)}}" class="relative">
               <div class="header bg-gray-500 h-60"></div>
               <div class="p-4">
                  <h2 class="text-lg font-semibold truncate-text">{{ $product->title }}</h2>
                  <div class="mt-4 flex justify-between items-center">
                     <span class="text-xl font-bold">{{ number_format($product->price, 2) }} $</span>
                     
                     @if (!auth()->user()->isAdmin())
                        <!-- Система лайков -->
                        <form action="{{ route('product.like', $product->id) }}" class="absolute right-4 top-4" method="POST">
                           @csrf
                           @if (auth()->user()->likedProducts->contains($product->id))
                              <button type="submit">
                                 <x-icons.like-fill/>
                              </button>
                           @else
                              <button type="submit">
                                 <x-icons.like-heart/>
                              </button>
                           @endif
                        </form>
                        <!-- Карзина -->
                        <div class="relative" style="bottom: -5px; right: 0px;">                 
                           <form action="{{ route('user.basket.add') }}" method="POST">
                              @csrf
                              <input type="hidden" name="quantity" value="1">
                              <input type="hidden" name="product_id" value="{{ $product->id }}">
                              <button type="submit" class="btn btn-primary">
                                 <x-icons.basket-product/>
                              </button>
                           </form>
                        </div>
                     @endif
                  </div>
               </div>   
            </a>
         </div>
      @endforeach
   </div>
   <div class="my-12">
      {{ $products->links('vendor.pagination.tailwind') }}
   </div>
   @push('basket')
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
         $(document).on('click', '.like-btn', function (e) {
            e.preventDefault();
            let button = $(this);
            let productId = button.data('product-id');
            $.ajax({
               url: `/product/${productId}/like`,
               type: 'POST',
               data: {
                  _token: '{{ csrf_token() }}'
               },
               success: function (response) {
                  if (response.liked) {
                     button.text('Unlike');
                  } else {
                     button.text('Like');
                  }
               },
               error: function (error) {
                  console.log(error);
               }
            });
         });
      </script>
   @endpush
@endsection