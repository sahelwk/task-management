<!-- edit.blade.php -->

@extends('layouts.app')

@section('content')
  <h1>Edit Task</h1>

  @if ($errors->any())
    <div class="alert alert-danger mt-2">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="project_id">Project ID:</label>
      <input type="number" name="project_id" id="project_id" class="form-control" value="{{ $task->project_id }}">
    </div>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
    </div>
    <div class="form-group">
      <label for="status">Status:</label>
      <input type="text" name="status" id="status" class="form-control" value="{{ $task->status }}">
    </div>
    <div class="form-group">
      <label for="deadline">Deadline:</label>
      <input type="text" name="deadline" id="deadline" class="form-control" value="{{ $task->deadline }}">
    </div>
    <div class="form-group">
      <label for="priority">Priority:</label>
      <input type="text" name="priority" id="priority" class="form-control" value="{{ $task->priority }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
@endsection
