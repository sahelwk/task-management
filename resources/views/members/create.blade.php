 <!-- create.blade.php -->

@extends('layouts.app')

@section('content')
  <h1>Create Member</h1>

  @if ($errors->any())
    <div class="alert alert-danger mt-2">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('members.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="org_id">Organization:</label>


      <select name="org_id" class="form-control">
        @foreach ($organizations as $organization)

        <option value="{{$organization->id}}">{{$organization->name}}</option>
        @endforeach

      </select>

    </div>
    <div class="form-group">
      <label for="dep_id">Department:</label>

      <select name="dep_id" class="form-control">
        @foreach ($departments as $department)

        <option value="{{$department->id}}">{{$department->name}}</option>
        @endforeach

      </select>
    </div>
    <div class="form-group">
      <label for="project_id">Project:</label>

        @foreach ($projects as $project)

        <option value="{{$project->id}}">{{$project->name}}</option>
        @endforeach

      </select>
    </div>
    <div class="form-group">
        <label for="task_id">Task:</label>
         <select name="task_id" class="form-control">
          {{-- @foreach ($tasks as $task)

          <option value="{{$project->id}}">{{$task->name}}</option>
          @endforeach --}}

        </select>
      </div>

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
    </div>
    <div class="form-group">
      <label for="role">Role:</label>
      <input type="text" name="role" id="role" class="form-control" value="{{ old('role') }}">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
    <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
@endsection
