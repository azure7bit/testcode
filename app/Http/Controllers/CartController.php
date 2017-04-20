<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cart;
use Validator;
use App\Product;
use App\Category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Controller as BaseController;

use App\Http\Traits\SearchTrait;
use App\Http\Traits\CartTrait;

class CartController extends Controller
{
    //
    use SearchTrait, CartTrait;

    public function __construct() {
        $this->middleware('auth');
    }

    public function showCart() {

        $user_id = Auth::user()->id;
        
        $cart_products = Cart::with('product')->where('user_id', '=', $user_id)->get();

        // dd($cart_products);

        $cart_total = Cart::with('product')->where('user_id', '=', $user_id)->sum('total');

        $search = $this->search();

        $categories = Category::all();

        $count = Cart::where('user_id', '=', $user_id)->count();

        $cart_count = $this->countProductsInCart();

        return view('cart.cart', compact('search', 'categories', 'count', 'cart_count'))
            ->with('cart_products', $cart_products)
            ->with('cart_total', $cart_total);
    }

    public function addCart() {

        $rules = array(
            'qty' => 'required|numeric',
            'product'   => 'required|numeric|exists:products,id'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            // flash()->error('Error', 'The product could not added to your cart!');
            return redirect('/');
        }

        $user_id = Auth::user()->id;

        $product_id = Input::get('product');

        $qty = Input::get('qty');

        $product = Product::find($product_id);

        $total = $qty * $product->selling_price;

        Cart::create(
            array (
                'user_id'    => $user_id,
                'product_id' => $product_id,
                'qty'        => $qty,
                'total'      => $total
            )
        );

        return redirect()->route('cart');

    }

    public function update() {

        $user_id = Auth::user()->id;

        $qty = Input::get('qty');

        $product_id = Input::get('product');

        $cart_id = Input::get('cart_id');
        
        $product = Product::find($product_id);

        $total = $qty * $product->selling_price;

        $cart = Cart::where('user_id', '=', $user_id)->where('product_id', '=', $product_id)->where('id', '=', $cart_id);

        $cart->update(array(
            'user_id'    => $user_id,
            'product_id' => $product_id,
            'qty'        => $qty,
            'total'      => $total
        ));

        return redirect()->route('cart');
    }
    
    public function delete($id) {
        Cart::find($id)->delete();
        return redirect()->back();
    }
}
