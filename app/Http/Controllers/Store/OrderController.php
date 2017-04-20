<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Order;

class OrderController extends Controller
{
    //
    public function index()
    {
    	$orders = Auth::guard('store')->user()->orders;
    	return view('store.order.index', compact('orders'));
    }

    public function show($id)
    {
    	$order = Auth::guard('store')->user()->orders->find($id);
    	return view('store.order.show', compact('order'));	
    }

    public function destroy($id)
    {
    	$order = Auth::guard('store')->user()->orders->find($id);
    	$order->delete();
    	return redirect(route('store.my_orders'));
    }
}
