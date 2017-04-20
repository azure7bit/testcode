@extends('admin.layout.auth')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Edit Product</div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="post" action="{{ route('admin.update_product', $product->id) }}">
            {{ csrf_field() }}
            @include('admin.product.form')
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection