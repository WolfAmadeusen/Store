<?php

namespace App\Http\Controllers\admin\statistic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class StatisticController extends Controller
{
   public function statistics()
   {
      return view('admin.statistics');
   }
}
