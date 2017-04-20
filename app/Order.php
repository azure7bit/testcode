<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['user_id', 'store_id', 'address', 'city', 'phone', 'total', 'full_name'];

    public function customer()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function order_products()
    {
        return $this->belongsToMany('App\Product')->withPivot('qty', 'price', 'total');
    }

    public function order_items()
    {
        return $this->hasMany('App\OrderProduct', 'order_id');   
    }
}
