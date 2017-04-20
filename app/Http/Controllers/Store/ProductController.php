<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $products = Product::where('store_id', Auth::guard('store')->user()->id)->get();

      return view('store.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();

      $product = new Product();
      return view('store.product.create', compact('product', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      $input = $request->all();

      $param_products = [
        'name' => $input['name'],
        'category_id' => $input['category_id'],
        'selling_price' => $input['selling_price'],
        'purchasing_price' => $input['purchasing_price'],
        'product_sku' => $input['product_sku'],
        'description' => $input['description'],
        'store_id' => Auth::guard('store')->user()->id,
        'qty' => $input['qty']
      ];

      $product = Product::create($param_products);

      return redirect(route('store.product_detail', $product->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //
      $product = Product::find($id);
      return view('store.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
      $categories = Category::all();

      $product = Product::find($id);
      return view('store.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
      $input = $request->all();

      $param_products = [
        'name' => $input['name'],
        'category_id' => $input['category_id'],
        'selling_price' => $input['selling_price'],
        'purchasing_price' => $input['purchasing_price'],
        'product_sku' => $input['product_sku'],
        'description' => $input['description'],
        'store_id' => Auth::guard('store')->user()->id,
        'qty' => $input['qty']
      ];

      $product = Product::find($id);

      if($product)
      {
        $product->update($param_products);
      }

      return redirect(route('store.product.show', $product->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
      $product = Product::find($id);

      if($product)
      {
        $product->delete();
      }

      return redirect(route('store.my_products'));
    }
  }
