@extends('admin.layout.auth')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Stores</div>

          <div class="panel-body">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Product Count</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($stores as $store)
                  <tr>
                    <td>{{$store->name}}</td>
                    <td>{{$store->email}}</td>
                    <td>{{$store->products->count()}}</td>
                    <td>
                      <a href="{{route('admin.store.show', $store->id)}}">show</a>
                      <a href="{{route('admin.store.edit', $store->id)}}">edit</a>
                      <a href="{{route('admin.delete_store', $store->id)}}"
                        onclick="event.preventDefault();document.getElementById('delete-form-{{$store->id}}').submit();">
                        delete
                      </a>
                      <form id="delete-form-{{$store->id}}" action="{{route('admin.delete_store', $store->id)}}" method="POST" style="display: none;">
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