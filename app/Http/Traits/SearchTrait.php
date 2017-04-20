<?php
namespace App\Http\Traits;

use App\Product;
use Illuminate\Support\Facades\Input;

trait SearchTrait {
  public function search() {
    $query = Input::get('search');
    return Product::where('name', 'LIKE', '%' . $query . '%')->paginate(200);
  }
}