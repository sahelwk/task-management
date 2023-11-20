<!-- edit.blade.php -->

@extends('layouts.app')

@section('content')
  <h1>Edit Member</h1>

  @if ($errors->any())
    <div class="alert alert-danger mt-2">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('members.update', $member->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="org_id">Organization ID:</label>
      <input type="number" name="org_id" id="org_id" class="form-control" value="{{ old('org_id', $member->org_id) }}">
    </div>
    <div class="form-group">
      <label for="dep_id">Department ID:</label>
      <input type="number" name="dep_id" id="dep_id" class="form-control" value="{{ old('dep_id', $member->dep_id) }}">
    </div>
    <div class="form-group">
      <label for="project_id">Project ID:</label>
      <input type="number" name="project_id" id="project_id" class="form-control" value="{{ old('project_id', $member->project_id) }}">
    </div>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $member->name) }}">
    </div>
    <div class="form-group">
      <label for="role">Role:</label>
      <input type="text" name="role" id="role" class="form-control" value="{{ old('role', $member->role) }}">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $member->email) }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
@endsection
