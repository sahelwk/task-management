<!-- show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Task Details</h1>

  <div class="row">
    <div class="col-md-6">
  <div class="card mt-4">
    <div class="card-body">
      <h5 class="card-title">ID: {{ $task->id }}</h5>
      <p class="card-text">Project ID: {{ $task->project->name}}</p>
      <p class="card-text">Name: {{ $task->name }}</p>
      <p class="card-text">Description: {{ $task->description }}</p>
      <p class="card-text">Status: {{ $task->status }}</p>
      <p class="card-text">Deadline: {{ $task->deadline }}</p>
      <p class="card-text">Priority: {{ $task->priority }}</p>
    </div>
  </div>

  <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-4">Back to Tasks</a>
</div>
<div class="col-md-6">

    @hasrole('Manager|Admin')
    <div class="card mt-4">
        <div class="card-body">
            <h1>User lists </h1>
            <form method="post" action="{{ route('taskAssign.store') }}">
                @csrf
                @foreach ($users as $user)
                <div class="form-radio">
                    <input id="user-{{ $user->id }}" type="radio" name="user_id" value="{{ $user->id }}" class="form-radio-input">

                    <label for="user-{{ $user->id }}" class="form-radio-label">{{ $user->name }}</label>

                    <input type="hidden" name="task_id" value="{{ $task->id}}">
                </div>
                @endforeach

                <button type="submit" class="btn btn-primary m-4">Assign this task to one of this user</button>

            </form>

        </div>
    </div>
    @endhasrole
    </div>


  </div>
</div>
</div>
@endsection
