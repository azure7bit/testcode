@extends('store.layout.auth')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Products</div>

          <div class="panel-body">
            <a href="{{route('store.product_create')}}" class="btn">Create New</a>
            <br/><br/>
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>SKU</th>
                  <th>Category</th>
                  <th>Quantity</th>
                  <th>Purchasing Price</th>
                  <th>Selling Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                  <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->product_sku}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->qty}}</td>
                    <td>$ {{$product->purchasing_price}}</td>
                    <td>$ {{$product->selling_price}}</td>
                    <td>
                      <a href="{{route('store.product_detail', $product->id)}}">show</a>
                      <a href="{{route('store.product_edit', $product->id)}}">edit</a>
                      <a href="{{route('store.product_delete', $product->id)}}"
                        onclick="event.preventDefault();document.getElementById('delete-form-{{$product->id}}').submit();">
                        delete
                      </a>
                      <form id="delete-form-{{$product->id}}" action="{{route('store.product_delete', $product->id)}}" method="post" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection