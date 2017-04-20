<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Order;
use App\Category;

use App\Http\Traits\SearchTrait;
use App\Http\Traits\CartTrait;

class ProfileController extends Controller
{
    //
    use SearchTrait, CartTrait;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        $categories = Category::all();

        $search = $this->search();

        $cart_count = $this->countProductsInCart();

        $username = \Auth::user();

        $user_id = $username->id;

        $orders = Order::where('user_id', '=', $user_id)->get();

        return view('profile.index', compact('categories', 'search', 'cart_count', 'username', 'orders'));
    }
}
