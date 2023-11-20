@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header d-block text-center">

                <form action="{{ route('users.index') }}" method="GET" class="d-flex justify-content-center mb-4">
            <div class="row">
             <div class="col-md-12 d-flex">
                <div class="input-group">
                     <input type="text" name="search" class="form-control">
                      </div>
                         <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
                <h2 class="text-dark">Users</h2>
            </div>
            <a href="{{ route('users.create') }}" class="btn btn-success mb-2"> Add New User</a>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                      {{-- ?php
                      $users = User::whereNotNull('last_seen')
                              ->orderBy('last_seen','desc')
                              ->get();
                      ?> --}}

            <div class="table-responsive">
                <table class="table mt-4 table-responsive">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Organization  </th>
                        <th>Department  </th>
                        <th>Project  </th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>last_seen</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ($users as $user)
                        <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{$user->organization->name  ?? '' }}</td>
                          <td>{{ $user->department->name  ?? ''}}</td>
                          <td>{{ $user->project->name  ?? ''}}</td>
                          <td>{{ $user->name }}</td>
                          <td>
                            @foreach ($user->roles as $role)
                                {{ $role->name }}<br>
                            @endforeach
                          </td>
                          <td>{{ $user->email}}</td> 
                          <td>{{$user->status}}</td>
                          <td>

                           {{Carbon\Carbon::parse($user->last_seen)->diffForHumans()}}
                           @if(Cache::has('$user-is-online-' .$user->id))
                           <span class="text-center"><font color="red">Online</font></span>
                           @else
                           <span class= "text-center"><font color="red">Offline</font> </span>
                           @endif
                          </td>



                          <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('users.delete', $user->id) }}" method="POST" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="pagination text-center d-flex align-self-center">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

</div>
<style>
    /* Add CSS for table scrolling */
    .table-fixed {
        width: 100%;
        overflow-x: auto;
    }
</style>

@endsection
