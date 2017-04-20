<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use App\Http\Traits\SearchTrait;
use App\Http\Traits\CartTrait;

use App\Product;
use App\Category;

class ProductsController extends Controller
{
    //
    use SearchTrait, CartTrait;
    
    public function show($id) {
        $product = Product::find($id);

        $search = $this->search();

        $categories = Category::all();

        $cart_count = $this->countProductsInCart();

        $similar_product = Product::where('id', '!=', $product->id)
            ->where(function ($query) use ($product) {
                $query->where('category_id', '=', $product->category_id);
            })->get();

        return view('pages.show_product', compact('product', 'search', 'categories', 'similar_product', 'cart_count'));
    }
}
