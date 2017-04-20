<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Traits\SearchTrait;
use App\Http\Traits\CartTrait;

use App\Category;
use App\Product;

class PagesController extends Controller
{
    //
    use SearchTrait, CartTrait;

    public function index()
    {
        $products = Product::orderByRaw('RAND()')->take(4)->get();
        $new_products = Product::orderBy('created_at', 'desc')->take(4)->get();
        $categories = Category::all();
        $search = $this->search();
        $cart_count = $this->countProductsInCart();

        return view('pages.index', compact('products', 'categories', 'new_products', 'search', 'cart_count'));
    }

    public function displayProducts($id) {
        $category = Category::find($id);

        if (!$category) {
            return redirect('/');
        }

        $categories = Category::all();

        $search = $this->search();

        $count = $category->products->count();

        $cart_count = $this->countProductsInCart();

        return view('category.show', compact('categories', 'category', 'search', 'cart_count'))->with('count', $count);
    }
}
