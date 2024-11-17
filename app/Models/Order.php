<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
   use HasFactory;
   protected $fillable = ['full_name', 'post', 'number', 'region', 'city'];

   public function items() {
      return $this->hasMany(OrderItem::class);
   }
}
