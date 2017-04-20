@extends('admin.layout.auth')

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
                  <th>Customer</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $order)
                  @if($order->order_items)
                    <tr>
                      <td>{{$order->created_at}}</td>
                      <td>{{$order->full_name}}</td>
                      <td>{{$order->address}}</td>
                      <td>{{$order->city}}</td>
                      <td>$ {{$order->total}}</td>
                      <td>
                        <a href="{{route('admin.order.show', $order->id)}}">show</a>
                        <a href="{{route('admin.delete_order', $order->id)}}"
                          onclick="event.preventDefault();document.getElementById('delete-form-{{$order->id}}').submit();">
                          delete
                        </a>
                        <form id="delete-form-{{$order->id}}" action="{{route('admin.delete_order', $order->id)}}" method="post" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                      </td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection