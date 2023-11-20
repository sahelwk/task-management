@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
        <div class="col-md-12">
            <div class="page-header d-block text-center">
                <h1 class="text-dark">Roles</h1>
                <form action="{{ route('roles.index') }}" method="GET" class="d-flex justify-content-center mb-4">
            <div class="row">
             <div class="col-md-12 d-flex">
                <div class="input-group">
                     <input type="text" name="search" class="form-control">
                      </div>
                         <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Create Role</a>


<div class="table-responsive">
<table class="table table-bordered table-striped table-fixed">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Permission</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($roles as $role)
            <tr>
                 <td>{{ $loop->iteration }}</td>
                 <td class="text-xl-start">{{ $role->name}}</td>
                 <td>

@foreach ($role->permissions as $permission)
<span style="font-size: 16px; font-weight: lighter"
    class="badge bg-pill bg-success text-light ">
    {{ $permission->name }}</span>
 @endforeach
</td>
                <td class="d-flex">
                    <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('roles.destroy', $role) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="pagination text-center d-flex align-self-center">
                {{ $roles->links('pagination::bootstrap-5') }}
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
