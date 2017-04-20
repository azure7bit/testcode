<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\Category;
use App\Store;

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
      $products = Product::all();
      return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      $stores = Store::all();
      $categories = Category::all();

      $product = new Product();
      return view('admin.product.create', compact('product', 'categories', 'stores'));
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
        'store_id' => $input['store_id'],
        'qty' => $input['qty']
      ];

      $product = Product::create($param_products);

      return redirect(route('admin.product.show', $product->id));
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
      return view('admin.product.show', compact('product'));
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
      $stores = Store::all();
      $categories = Category::all();

      $product = Product::find($id);
      return view('admin.product.edit', compact('product', 'stores', 'categories'));
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
        'store_id' => $input['store_id'],
        'qty' => $input['qty']
      ];

      $product = Product::find($id);

      if($product)
      {
        $product->update($param_products);
      }

      return redirect(route('admin.product.show', $product->id));
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

      return redirect(route('admin.product.index'));
    }
  }
