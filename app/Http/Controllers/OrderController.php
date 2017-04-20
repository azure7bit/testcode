<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cart;
use App\Order;
use Validator;
use App\Product;
use App\Category;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Controller as BaseController;

use App\Http\Traits\SearchTrait;
use App\Http\Traits\CartTrait;

class OrderController extends Controller
{
    use SearchTrait, CartTrait;

    public function index() {

        $search = $this->search();

        $categories = Category::all();

        $cart_count = $this->countProductsInCart();

        $user_id = Auth::user()->id;

        $check_cart = Cart::with('product')->where('user_id', '=', $user_id)->count();

        $count = Cart::where('user_id', '=', $user_id)->count();

        if (!$check_cart) {
            return redirect()->route('cart');
        }

        $cart_products = Cart::with('product')->where('user_id', '=', $user_id)->get();

        $cart_total = Cart::with('product')->where('user_id', '=', $user_id)->sum('total');

        return view('cart.checkout', compact('search', 'categories', 'cart_count', 'count'))
            ->with('cart_products', $cart_products)
            ->with('cart_total', $cart_total);
    }

    public function postOrder(Request $request) {

        $validator = Validator::make($request->all(), [
            'address'    => 'required|max:50|min:4',
            'city'       => 'required|max:50|min:3',
            'phone'        => 'required|max:12|min:6',
            'full_name'  => 'required|max:30|min:2',
        ]);

        if ($validator->fails()) {
            return redirect('/checkout')
                ->withErrors($validator)
                ->withInput();
        }

        $address = Input::get('address');
        $city = Input::get('city');
        $phone = Input::get('phone');
        $full_name = Input::get('full_name');

        $user_id = Auth::user()->id;

        $cart_products = Cart::with('product')->where('user_id', '=', $user_id)->get();

        $cart_total = Cart::with('product')->where('user_id', '=', $user_id)->sum('total');

        $charge_amount = number_format($cart_total, 2) * 100;

        $order = Order::create (
            array(
                'user_id'    => $user_id,
                'address'    => $address,
                'city'       => $city,
                'phone'        => $phone,
                'total'      => $cart_total,
                'full_name'  => $full_name
            ));

        foreach ($cart_products as $order_products) {
            $order->order_products()->attach($order_products->product_id, array(
                'qty'    => $order_products->qty,
                'price'  => $order_products->product->selling_price,
                'total'  => $order_products->product->selling_price * $order_products->qty
            ));
        }

        \DB::table('products')->decrement('qty', $order_products->qty);

        Cart::where('user_id', '=', $user_id)->delete();
        
        // flash()->success('Success', 'Your order was processed successfully.');

        return redirect()->route('cart');
    }
}