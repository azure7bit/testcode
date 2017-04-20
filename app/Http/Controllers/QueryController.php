<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;

use Illuminate\Support\Facades\Input;

use App\Http\Traits\CartTrait;

class QueryController extends Controller
{
    //
    use CartTrait;

    public function search() {
        $categories = Category::all();

        $cart_count = $this->countProductsInCart();

        $query = Input::get('search');

        $search = Product::where('name', 'LIKE', '%' . $query . '%')->paginate(200);

        if ($search->isEmpty()) {
            flash()->info('Not Found', 'No search results found.');
            return redirect('/');
        }

        return view('pages.search', compact('search', 'query', 'categories', 'cart_count'));
    }
}
