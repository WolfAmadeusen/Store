@if ($paginator->hasPages())
   <nav role="navigation" aria-label="Pagination" class="flex justify-start items-center gap-2 mt-6">
      
      {{-- Кнопка для перехода на предыдущую страницу --}}
      @if ($paginator->onFirstPage())
         <span class="px-4 py-2 text-gray-300 bg-gray-200 rounded-md cursor-not-allowed" aria-disabled="true">«</span>
      @else
         <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">«</a>
      @endif
      
      {{-- Номера страниц --}}
      <div class="flex gap-2">
         @foreach ($elements as $element)
            {{-- "Точка" разделитель --}}
            @if (is_string($element))
               <span class="px-4 py-2 text-gray-300 bg-gray-200 rounded-md">{{ $element }}</span>
            @endif

            {{-- Номера страниц --}}
            @if (is_array($element))
               @foreach ($element as $page => $url)
                  @if ($page == $paginator->currentPage())
                     <span class="px-4 py-2 text-white bg-blue-600 rounded-md">{{ $page }}</span>
                  @else
                     <a href="{{ $url }}" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">{{ $page }}</a>
                  @endif
               @endforeach
            @endif
         @endforeach
      </div>

      {{-- Кнопка для перехода на следующую страницу --}}
      @if ($paginator->hasMorePages())
         <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">»</a>
      @else
         <span class="px-4 py-2 text-gray-300 bg-gray-200 rounded-md cursor-not-allowed" aria-disabled="true">»</span>
      @endif
      
   </nav>
@endif
