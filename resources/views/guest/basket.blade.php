@extends('layouts.main')

@section('title', 'Корзина')

@section('content')
   <h1 class="my-4">Корзина</h1>
   <x-container>
      @if (empty($basket))
         @if (session('message'))
            <p>{{ session('message') }}</p>
         @else
            <p>Корзина пуста.</p>
         @endif
      @else
         <table class="table table-bordered table-striped">
            <thead class="table-dark">
               <tr>
                  <th>Товар</th>
                  <th>Цена</th>
                  <th>Количество</th>
                  <th>Действия</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($basket as $item)
                  <tr>
                     <td>{{ $item['name'] }}</td>
                     <td>{{ $item['price'] }}$</td>
                     <td>
                        <form action="{{ route('guest.basket.update.quantity', $item['product_id']) }}" method="post" class="d-flex justify-center gap-2">
                           @csrf
                           <input type="number" name="quantity" value="{{ $item['quantity'] }}" class="form-control w-50">
                           <button type="submit" class="btn btn-primary">Сохранить</button>
                        </form>                        
                     </td>
                     <td>
                        <form action="{{ route('guest.basket.remove', $item['product_id']) }}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>
         <div class="text-end mb-2">
            <strong class="fs-5">Общая сумма: {{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $basket)) }}$</strong>
         </div>

         <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#orderFormModal">Заказать</button>
      @endif
   </x-container>

   <div class="modal fade" id="orderFormModal" tabindex="-1" aria-labelledby="orderFormModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="orderFormModalLabel">Форма заказа</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
               <form action="{{ route('guest.basket.order') }}" class="p-4 border rounded shadow-sm mb-4">
                  @csrf
                  <div class="mb-3">
                     <input type="text" name="full_name" placeholder="Полное имя" class="form-control">
                  </div>
                  <div class="mb-3">
                     <input type="text" name="post" placeholder="Адрес" class="form-control">
                  </div>
                  <div class="input-group mb-3">
                     <input type="text" name="number_phone" class="form-control" placeholder="Номер телефона" aria-label="Номер телефона" aria-describedby="basic-addon1">
                  </div>
                  <div class="mb-3">
                     <input type="text" name="region" placeholder="Область" class="form-control">
                  </div>
                  <div class="mb-3">
                     <input type="text" name="city" placeholder="Город" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-success ">Заказать</button>
               </form>
            </div>
         </div>
      </div>
   </div>
   @push('product')
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   @endpush
@endsection
