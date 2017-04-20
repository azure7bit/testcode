@extends('admin.layout.auth')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Profile Customer</div>
        <div class="panel-body">
          <h2>{{$user->name}}</h2>
          <hr/>
          <div class="col-md-6">
            <p><strong>Full name :</strong> {{$user->orders->last()->full_name}}</p>
            <p><strong>Email :</strong> {{$user->orders->last()->full_name}}</p>
            <p>
              <strong>Address :</strong> 
              {{$user->orders->last()->address}}
            </p>
            <p><strong>Total Orders :</strong> {{$user->orders->sum('total')}}</p>
          </div>
          <div class="clearfix"></div>
          <hr/>
          <h4>Order List</h4>
          <div class="col-md-12">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($user->orders as $order)
                  <tr>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->order_items->sum('qty')}}</td>
                    <td>{{$order->order_items->sum('price')}}</td>
                    <td>{{$order->total}}</td>
                    <td><a href="{{route('admin.order.show', $order->id)}}">view</a></td>
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