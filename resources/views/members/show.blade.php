<!-- show.blade.php -->

@extends('layouts.app')

@section('content')
  <h1>Member Details</h1>
   <div class="row">
    <div class="col-md-6">
  <div class="card mt-4">
    <div class="card-body">
      <h5 class="card-title">ID: {{ $member->id }}</h5>
      <p class="card-text"><strong>Organization :</strong> {{ $member->organization->name }}</p>
      <p class="card-text"><strong>Department :</strong> {{ $member->department->name }}</p>
      <p class="card-text"><strong>Project :</strong> {{ $member->project->name }}</p>
      <p class="card-text"><strong>Name:</strong> {{ $member->name }}</p>
      <p class="card-text"><strong>Role:</strong> {{ $member->role }}</p>
      <p class="card-text"><strong>Email:</strong> {{ $member->email }}</p>
    </div>
  </div>

  <a href="{{ route('members.index') }}" class="btn btn-secondary mt-4">Back to Members</a>
</div>

<div class="col-md-6">
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-4">Assigned tasks</a>
    <div class="card mt-4">
      <div class="card-body">
        <p class="card-text"><strong>Task :</strong> {{ $member->task->name }}</p>
      </div>
    </div>


  </div>

</div>


@endsection
