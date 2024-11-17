<?php

namespace App\Models;

use ftp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   use HasFactory;

   protected $fillable = ['title', 'description', 'price'];

   public function categories()
   {
      return $this->belongsToMany(Category::class, 'category_product');
   }

   public function likedByUsers()
   {
      return $this->belongsToMany(User::class, 'favorites');
   }

   public function order()
   {
      return $this->belongsToMany(Order::class, 'order_items')->withPivot('quantity', 'price');
   }
}
