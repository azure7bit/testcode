<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    //
    protected $fillable = ['order_id', 'product_id', 'qty', 'price', 'total'];

    protected $table = 'order_product';
    
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function income()
    {
        return $this->total - $this->total_purchasing();
    }

    public function total_purchasing()
    {
        return ($this->qty * $this->product->purchasing_price);
    }
}
