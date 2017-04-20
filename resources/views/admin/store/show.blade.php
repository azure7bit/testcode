@extends('admin.layout.auth')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Details Store</div>
        <div class="panel-body">
          <h2>{{$store->name}}</h2>
          <hr/>
          <div class="col-md-6">
            <p><strong>Name :</strong> {{$store->name}}</p>
            <p>
              <strong>Email :</strong> 
              {{$store->email}}
            </p>
          </div>
          <div class="clearfix"></div>
          <hr/>
          <h4>History Orders</h4>
          <div class="col-md-12">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>Order Date</th>
                  <th>Total Purchasing</th>
                  <th>Total Selling</th>
                  <th>Income</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $arrPurchase=[]; $arrIncome=[]; ?>
                @foreach($store->orders as $order)
                  <?php array_push($arrPurchase, $order->total_purchasing()); array_push($arrIncome, $order->income())?>
                  <tr>
                    <td>{{$order->order->created_at}}</td>
                    <td>$ {{$order->total_purchasing()}}</td>
                    <td>$ {{$order->total}}</td>
                    <td>$ {{$order->income()}}</td>
                    <td><a href="{{route('admin.order.show', $order->order_id)}}">view</a></td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td>Total</td>
                  <td>$ {{array_sum($arrPurchase)}}</td>
                  <td>$ {{$store->orders->sum('total')}}</td>
                  <td>$ {{array_sum($arrIncome)}}</td>
                  <td></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection