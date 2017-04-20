@extends('admin.layout.auth')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">New Category</div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.category.store') }}">
            {{ csrf_field() }}
            @include('admin.category.form')
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection