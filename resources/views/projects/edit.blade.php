<!-- edit.blade.php -->

@extends('layouts.app')

@section('content')
  <h1 class="text-center">Edit Project</h1>

  <form action="{{ route('projects.update', $project->id) }}" method="POST" class="form-control pb-5 ">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="dep_id">Departments:</label>
   <select class="form-control bg-info"name ="dep_id" id="dep_id" >
    @foreach($departments as $department)
  <option value="{{$department->dep_id}}"{{$department->id == $project->department->id ? 'selected' : ''}}>{{$department->name}}</option>
     @endforeach
</select>
 
    </div>

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" class="form-control bg-info" value="{{ $project->name }}" required>
    </div>

    <button type="submit" class="btn btn-primary m-5">Update Project</button>
  </form>
@endsection
