<!-- index.blade.php -->

@extends('layouts.app')

@section('content')
  
  <form action="{{ route('projects.index') }}" method="GET" class="d-flex justify-content-center mb-4">
            <div class="row">
             <div class="col-md-12 d-flex">
                <div class="input-group">
                     <input type="text" name="search" class="form-control">
                      </div>
                         <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
                <h1 class="text-center text-dark">Projects</h1>
  <a href="{{ route('projects.create') }}" class="btn btn-primary m-2">Create Project</a>

  @if (session('success'))
    <div class="alert alert-success mt-2">
      {{ session('success') }}
    </div>
  @endif
 <div class="container pb-5">
  <table class="table mt-4">
    <thead>
      <tr>
        <th>ID</th>
        <th>Department name</th>
        <th>Name</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($projects as $project)
        <tr>
          <td>{{ $project->id }}</td>
          <td>{{ $project->department->name }}</td>
          <td>{{ $project->name }}</td>
          <td>
            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm">Show</a>
            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{ route('projects.delete', $project->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
