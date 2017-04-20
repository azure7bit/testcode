@extends('app')

@section('content')

  <div id="wrapper">

    @include('pages.partials.side-nav')

    <!-- Button to toggle side-nav -->
    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars fa-5x"></i></a>

    <div class="container-fluid">

      <div class="col-md-12">

        <h4 class="text-center">Your Orders</h4><br>

        <div class="menu">
          <div class="accordion">
            @if ($orders->count() == 0)
              You have no orders
            @else
              @foreach($orders as $order)
                <div class="accordion-group">
                  <div class="accordion-heading" id="accordion-group">
                    <a class="accordion-toggle" data-toggle="collapse" href="#order{{$order->id}}">Order #{{$order->id}} - {{$order->created_at}}</a>
                  </div>
                  <div id="order{{$order->id}}" class="accordion-body collapse">
                    <div class="accordion-inner">
                      <table class="table table-striped table-condensed">
                        <thead>
                        <tr>
                          <th>
                            Product
                          </th>
                          <th>
                            Quantity
                          </th>
                          <th>
                            Product Price
                          </th>
                          <th>
                            Total
                          </th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($order->order_products as $orderitem)
                            <tr>
                              <td><a href="{{ route('show.product', $orderitem->product_name) }}">{{$orderitem->name}}</a></td>
                              <td>{{$orderitem->pivot->qty}}</td>
                              <td>
                                ${{ $orderitem->pivot->price }}
                              </td>
                              <td>
                                ${{$orderitem->pivot->total}}
                              </td>
                            </tr>
                          @endforeach
                          <tr>
                            <td><b>Customer Info</b></td>
                            <td>{{ $order->full_name }}</td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td><b>Shipping Address</b></td>
                            <td>{{$order->address}}<br>{{$order->city}}</td>
                            <td><b>Total</b></td>
                            <td><b>${{$order->total}}</b></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </div>
        </div>

      </div>

    </div>  <!-- close container-fluid -->

  </div>  <!-- close wrapper -->

@endsection