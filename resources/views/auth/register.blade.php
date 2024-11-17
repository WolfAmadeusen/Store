@section('title', 'Регистрация')

<x-guest-layout>
   <form method="POST" action="{{ route('register') }}">
      @csrf

      <!-- Name -->
      <div>
         <x-input-label for="name" :value="__('Имя пользователя')" />
         <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
         <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>
      <!-- Full name -->
      <div class="mt-4">
         <x-input-label for="full_name" :value="__('Полное имя (Ф.И.О)')" />
         <x-text-input id="full_name" class="block mt-1 w-full" type="text" name="full_name" :value="old('full_name')" required autofocus autocomplete="full_name" />
         <x-input-error :messages="$errors->get('Full_name')" class="mt-2" />
      </div>

      <!-- number phone -->
      <div class="mt-4">
         <x-input-label for="number_phone" :value="__('Номер телефона')" class="mb-2" />
         <x-text-input id="number_phone" class="block mt-1 w-full" type="tel" name="number_phone" :value="old('number_phone')" required autofocus autocomplete="number_phone" />
         <x-input-error :messages="$errors->get('number_phone')" class="mt-2" />
      </div>

      <!-- City and region -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
         <div>
            <label for="inputCity" class="block text-sm font-medium text-gray-700">Город</label>
            <input type="text" id="inputCity" name="city" placeholder="Киев" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
         </div>
         <div>
            <label for="inputState" class="block text-sm font-medium text-gray-700">Область</label>
            <select name="region" id="inputState" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
               <option selected>Винницкая область</option>
               <option>Волынская область</option>
               <option>Днепропетровская область</option>
               <option>Донецкая область</option>
               <option>Житомирская область</option>
               <option>Закарпатская область</option>
               <option>Запорожская область</option>
               <option>Ивано-Франковская область</option>
               <option>Киевская область</option>
               <option>Кировоградская область</option>
               <option>Луганская область</option>
               <option>Львовская область</option>
               <option>Николаевская область</option>
               <option>Одесская область</option>
               <option>Полтавская область</option>
               <option>Ровненская область</option>
               <option>Сумская область</option>
               <option>Тернопольская область</option>
               <option>Харьковская область</option>
               <option>Херсонская область</option>
               <option>Хмельницкая область</option>
               <option>Черкасская область</option>
               <option>Черниговская область</option>
               <option>Черновицкая область</option>
            </select>
         </div>
      </div>
      <!-- Email Address -->
      <div class="mt-4">
         <x-input-label for="email" :value="__('Електронная почта')" />
         <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
         <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <!-- Password -->
      <div class="mt-4">
            <x-input-label for="password" :value="__('Пороль')" />

            <x-text-input id="password" class="block mt-1 w-full"
               type="password"
               name="password"
               required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <!-- Confirm Password -->
      <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Повтор пороля')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
               type="password"
               name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>

      <div class="mt-4">
         <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember_me" value="0">
            <span class="ms-2 text-sm text-gray-600">{{ __('Запомнить меня') }}</span>
         </label>
      </div>

      <div class="flex items-center justify-end mt-4">
         <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
            {{ __('Уже зарегестрировались?') }}
         </a>
         <x-primary-button class="ms-4">
            {{ __('Зарегистрироваться') }}
         </x-primary-button>
      </div>
   </form>
</x-guest-layout>