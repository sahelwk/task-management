@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ route('permissions.index') }}" method="GET" class="d-flex justify-content-center mb-4">
            <div class="row">
             <div class="col-md-12 d-flex">
                <div class="input-group">
                     <input type="text" name="search" class="form-control">
                      </div>
                         <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
<h1 class="text-dark">Permission list</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">Create Permission</a>




 <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-sm btn-primary">Edit</a>


                            <form action="{{ route('permissions.destroy', $permission) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this permission?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
</div>
     <div class="pagination text-center d-flex align-self-center">
                {{ $permissions->links('pagination::bootstrap-5') }}
      </div>
            <style>
    /* Add CSS for table scrolling */
    .table-fixed {
        width: 100%;
        overflow-x: auto;
    }
</style>
@endsection
