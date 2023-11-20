@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

<div class="form-group">
    <label for="org_id">Organization</label>
    <select class="form-control"  name="org_id">
        @foreach ($organizations as $org)

            <option value="{{$org->id}}" {{$org->id == $user->organization->id ? 'selected' : ''}} >{{$org->name}}</option>
        @endforeach
    </select>
    {{-- <input type="text" name="org_id" id="org_id" class="form-control" value="{{$user->organization->id}}"> --}}
  </div>
  <div class="form-group">
    <label for="dep_id">Department  </label>

    {{-- <input type="text" name="dep_id" id="dep_id" class="form-control" value="{{ old('dep_id', $user->department->id) }}"> --}}
    <select class="form-control"  name="dep_id">
        @foreach ($departments as $dep)

            <option value="{{$dep->id}}" {{$dep->id == $user->department->id ? 'selected' : ''}} >{{$dep->name}}</option>
        @endforeach
    </select>
</div>
  <div class="form-group">
    <label for="project_id">Project  </label>


    {{-- <input type="text" name="project_id" id="project_id" class="form-control" value="{{ old('project_id', $user->project->id) }}"> --}}
    <select class="form-control"  name="project_id">
        @foreach ($projects as $project)

            <option value="{{$project->id}}" {{$project->id == $user->project->id ? 'selected' : ''}} >{{$project->name}}</option>
        @endforeach
    </select>


</div>


  <div class="form-group">
    <label for="task_id">Task </label>
    <select class="form-control" multiple name="tasks_id[]">
        @foreach ($tasks as $key => $task)
            <option value="{{$task->id}}"
            @foreach ($user->tasks as $user_task)
                {{$task->id == $user_task->pivot->task_id ? 'selected' : ''}}
            @endforeach
             >{{$task->name}}</option>
        @endforeach
    </select>
    {{-- <input type="text" name="task_id" id="task_id" class="form-control" value="{{ $user->tasks}}"> --}}


  </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label for="roles">Roles</label><br>
            @foreach ($roles as $role)
                <div class="form-check form-switch">
                    <input type="checkbox" name="roles[]" class="form-check-input"  value="{{$role->name}}"{{ $user->hasRole($role) ? ' checked' : '' }}>
                    <label>{{$role->name}}</label>
                </div>

            @endforeach

        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
