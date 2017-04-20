@extends('admin.layout.auth')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Users</div>

          <div class="panel-body">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Orders Count</th>
                  <th>Total Orders</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->orders ? $user->orders->count() : 0}}</td>
                    <td>$ {{$user->orders ? $user->orders->sum('total') : 0}}</td>
                    <td>
                      <a href="{{route('admin.user.show', $user->id)}}">show</a>
                      <a href="{{route('admin.user.edit', $user->id)}}">edit</a>
                      <a href="{{route('admin.delete_user', $user->id)}}"
                        onclick="event.preventDefault();document.getElementById('delete-form-{{$user->id}}').submit();">
                        delete
                      </a>
                      <form id="delete-form-{{$user->id}}" action="{{route('admin.delete_user', $user->id)}}" method="POST" style="display: none;">
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