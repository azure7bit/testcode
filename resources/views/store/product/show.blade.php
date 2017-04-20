@extends('store.layout.auth')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Details Product</div>
        <div class="panel-body">
          <h2>{{$product->name}}</h2>
          <hr/>
          <div class="col-md-6">
            <p><strong>Name :</strong> {{$product->name}}</p>
            <p>
              <strong>Category :</strong> 
              {{$product->category->name}}
            </p>
            <p><strong>SKU :</strong> {{$product->product_sku}}</p>
          </div>
          <div class="col-md-6">
            <p><strong>Selling Price :</strong> $ {{$product->selling_price}}</p>
            <p><strong>Purchasing Price :</strong> $ {{$product->purchasing_price}}</p>
            <p><strong>Quantity :</strong> {{$product->qty}}</p>
            <p>{{$product->description}}</p>
          </div>
          <div class="clearfix"></div>
          <hr/>
          <h4>History Orders</h4>
          <div class="col-md-12">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>Order Date</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if($product->orders->count() > 0)
                @foreach($product->orders as $order)
                  <tr>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->total}}</td>
                    <td><a href="{{route('admin.order.show', $order->id)}}">view</a></td>
                  </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection