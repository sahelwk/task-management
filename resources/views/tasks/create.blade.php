<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Create Task</h1>

  @if ($errors->any())
    <div class="alert alert-danger mt-2">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('tasks.store') }}" method="POST"enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="project_id">Projects:</label>
      {{-- <input type="number" name="project_id" id="project_id" class="form-control" value="{{ old('project_id') }}"> --}}
      <select name="project_id"class="form-control">
        @foreach ($projects as $project)
        <option value="{{$project->id}}">{{$project->name}}</option>
        @endforeach

      </select>
    </div>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
    </div>
    <div class="form-group">
      <label for="status">Status:</label>
      <select  name="status" id="status" class="form-control">
        <option value="1">TODO</option>
        <option value="2">In Progress</option>
        <option value="3">Done</option>
      </select>
    </div>
    <div class="form-group">
      <label for="deadline">Deadline:</label>
      <input type="text" name="deadline" id="deadline" class="form-control" value="{{ old('deadline') }}">
    </div>
    <div class="form-group">
        <label for="file">File:</label>
        <input type="file" id="file" name="file" class="form-control">
    </div>

<div class="form-group">
    <label for="priority">Deadline:</label>
    <select  name="priority" id="priority" class="form-control">
      <option value="hiegh">Hiegh</option>
      <option value="Meduim">Meduim</option>
      <option value="Low">Low</option>
    </select>
  </div>


    {{-- <div class="form-group">
      <label for="priority">Priority:</label>
      <input type="text" name="priority" id="priority" class="form-control" value="{{ old('priority') }}">
    </div> --}}
    <button type="submit" class="btn btn-primary m-3">Create</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary m-3">Cancel</a>
  </form>
</div>
@endsection
