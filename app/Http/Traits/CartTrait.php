<?php
namespace App\Http\Traits;

use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

trait CartTrait {
  public function countProductsInCart() {
      if (Auth::check()) {
        $user_id = Auth::user()->id;
        return $cart_count = Cart::where('user_id', '=', $user_id)->count();
      }
  }
}