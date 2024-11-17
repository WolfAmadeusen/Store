<?php

namespace App\View\Components\Paginate;

use Illuminate\View\Component;

class Pagination extends Component
{
   public $products;

   public function __construct($products)
   {
      $this->products = $products;
   }

   public function render()
   {
      return view('components.paginate.pagination');
   }
}
