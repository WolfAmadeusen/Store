<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Faker\Core\Number;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
   /**
    * Display the registration view.
    */
   public function create(): View
   {
      return view('auth.register');
   }

   /**
    * Handle an incoming registration request.
    *
    * @throws \Illuminate\Validation\ValidationException
    */
   public function store(Request $request): RedirectResponse
   {
      $validated =$request->validate([
         'name'         => ['required', 'string', 'max:255'],
         'full_name'    => ['string', 'required', 'min:2'],
         'number_phone' => ['string', 'required'],
         'city'         => ['string', 'required',],
         'region'       => ['string', 'required',],
         'email'        => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
         'password'     => ['required', 'confirmed', Rules\Password::defaults()],
         'remember_me'  =>'boolean',
      ]);
      
      $remember_token = $request->has('remember_me') ?  Str::random(60) : null;
      
      $user = User::create([
         'name' => $request->name,
         'FIO' => $request->full_name,
         'number' => $request->number_phone,
         'city' => $request->city,
         'region' => $request->region,
         'email' => $request->email,
         'password' => Hash::make($request->password),
         'email_verified_at' => Carbon::now(),
         'admin_status' => 0,
         'remember_token' => $remember_token,
         'created_at' => Carbon::now(),
         'updated_at' => Carbon::now()
      ]);

      event(new Registered($user));
      //Авторизация пользователя
      Auth::login($user);

      return redirect(RouteServiceProvider::HOME);
   }
}
