@extends('store.layout.auth')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Orders</div>

          <div class="panel-body">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $order)
                  <tr>
                    <td>{{$order->order->created_at}}</td>
                    <td>{{$order->product->name}}</td>
                    <td>{{$order->qty}}</td>
                    <td>$ {{$order->price}}</td>
                    <td>$ {{$order->total}}</td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="2">Total</td>
                  <td>{{$orders->sum('qty')}}</td>
                  <td>$ {{$orders->sum('price')}}</td>
                  <td>$ {{$orders->sum('total')}}</td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection