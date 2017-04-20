@extends('admin.layout.auth')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Categories List</div>

          <div class="panel-body">
            <a href="{{route('admin.category.create')}}" class="btn">Create New</a>
            <br/><br/>
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Product Count</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                  <tr>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>{{$category->products ? $category->products->count() : 0}}</td>
                    <td>
                      <a href="{{route('admin.category.show', $category->id)}}">show</a>
                      <a href="{{route('admin.category.edit', $category->id)}}">edit</a>
                      <a href="{{route('admin.delete_category', $category->id)}}"
                        onclick="event.preventDefault();document.getElementById('delete-form-{{$category->id}}').submit();">
                        delete
                      </a>
                      <form id="delete-form-{{$category->id}}" action="{{route('admin.delete_category', $category->id)}}" method="POST" style="display: none;">
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