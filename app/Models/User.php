<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
   use HasApiTokens, HasFactory, Notifiable;

   /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
      'name',
      'FIO',
      'number',
      'city',
      'region',
      'email',
      'password',
      'admin_status',
      'remember_token',
      'email_verified_at',
      'created_at',
      'updated_at',
   ];

   /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
    */
   protected $hidden = [
      'password',
      'remember_token',
   ];

   /**
    * The attributes that should be cast.
    *
    * @var array<string, string>
    */
   protected $casts = [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
   ];

   public function isAdmin()
   {
      return $this->admin_status == 1;
   }

   public function likedProducts()
   {
      return $this->belongsToMany(Product::class, 'favorites');
   }

   public function basket()
   {
      return $this->hasMany(Order::class, 'user_id');
   }
}
