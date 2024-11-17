<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>@yield('title')</title>
      @stack('graphics')
      @stack('basket')
      @vite(['resources/css/icons.css', 'resources/css/style.css'])
</head>
<body>
   <x-app-layout>   
      <div class="py-12 ">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900">
                  @yield('content')
               </div>
            </div>
         </div>
      </div>
   </x-app-layout>
</body>
</html>