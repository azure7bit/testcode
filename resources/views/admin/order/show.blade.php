@extends('admin.layout.auth')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Details Order</div>
        <div class="panel-body">
          <h2>{{$order->created_at}}</h2>
          <hr/>
          <div class="col-md-6">
            <p><strong>Full Name :</strong> {{$order->full_name}}</p>
            <p>
              <strong>address :</strong> 
              {{$order->address}}
            </p>
          </div>
          <div class="col-md-6">
            <p><strong>email :</strong> {{$order->customer->email}}</p>
            <p>
              <strong>total :</strong> 
              $ {{$order->total}}
            </p>
          </div>
          <div class="clearfix"></div>
          <hr/>
          <h4>Order List</h4>
          <div class="col-md-12">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Qty</th>
                  <th>Selling Price</th>
                  <th>Purchasing Price</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($order->order_items as $order_product)
                  <tr>
                    <td>{{$order_product->product->name}}</td>
                    <td>{{$order_product->qty}}</td>
                    <td>{{$order_product->price}}</td>
                    <td>{{$order_product->product->purchasing_price}}</td>
                    <td>{{$order_product->total}}</td>
                    <td><a href="{{route('admin.product.show', $order_product->product_id)}}">view</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection