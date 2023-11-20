<!-- index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container ">

  <form action="{{ route('departments.index') }}" method="GET" class="d-flex justify-content-center mb-4">
            <div class="row">
             <div class="col-md-12 d-flex">
                <div class="input-group">
                     <input type="text" name="search" class="form-control">
                      </div>
                         <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
                <h1 class="text-center text-dark">Departments</h1>
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <a href="{{ route('departments.create') }}" class="btn btn-primary">Create Department</a>

  <table class="table mt-4">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($departments as $department)
        <tr>
          <td>{{ $department->id }}</td>
          <td>{{ $department->name }}</td>
          <td>{{ $department->description }}</td>
          <td>
            <a href="{{ route('departments.show', $department->id) }}" class="btn btn-info">Show</a>
            <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('departments.delete', $department->id) }}" method="get" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this department?')">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
