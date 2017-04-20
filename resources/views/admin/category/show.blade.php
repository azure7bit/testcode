@extends('admin.layout.auth')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Details Category</div>
        <div class="panel-body">
          <h2>{{$category->name}}</h2>
          <hr/>
          <div class="col-md-6">
            <p><strong>Name :</strong> {{$category->name}}</p>
            <p>
              <strong>Description :</strong> 
              {{$category->description}}
            </p>
          </div>
          <div class="clearfix"></div>
          <hr/>
          <h4>Products List</h4>
          <div class="col-md-12">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Qty</th>
                  <th>Selling Price</th>
                  <th>Purchasing Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($category->products as $product)
                  <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->qty}}</td>
                    <td>{{$product->selling_price}}</td>
                    <td>{{$product->purchasing_price}}</td>
                    <td><a href="{{route('admin.product.show', $product->id)}}">view</a></td>
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