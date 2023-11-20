<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
  <h1 class="text-center">Create Project</h1>

  <form action="{{ route('projects.store') }}" method="POST" class="form-control pb-5">
    @csrf

    <div class="form-group">
      <label for="dep_id">Departments:</label>
      <select name="dep_id"class="form-control">
        @foreach ($departments as $department)

        <option value="{{$department->id}}">{{$department->name}}</option>
        @endforeach

      </select>
    </div>


    <div class="form-group">
      <label for="name">Project Name:</label>
      <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <button type="submit" class="btn btn-primary m-4">Create Project</button>
  </form>
@endsection
