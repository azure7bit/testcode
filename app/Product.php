<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name', 'store_id', 'category_id', 'description', 'qty', 'purchasing_price', 'selling_price', 'product_sku'];
    
    public function product_images()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

    public function order_products()
    {
        return $this->hasMany('App\OrderProduct');
    }
}