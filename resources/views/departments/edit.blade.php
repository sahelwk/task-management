<!-- edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Edit Department</h1>
   
  <form action="{{ route('departments.update', $department->id) }}" method="POST" class="form-control">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" class="form-control" value="{{ $department->name }}" required>
    </div>

    <div class="form-group">
      <label for="description">Description:</label>
      <textarea id="description" name="description" class="form-control" required>{{ $department->description }}</textarea>
    </div>

    <!-- Assuming you have a foreign key 'org_id' in the 'departments' table -->
    <div class="form-group">
      
      <label for="org_id">Organization Name:</label>
   <select name="org_iid" class="form-control" id ="org_id">
    @foreach($organizations as $organization)
    <option value="{{$organization->id}}">{{$organization->name}}</option>
    @endforeach

  </select>
    </div>

    <button type="submit" class="btn btn-primary m-3">Update Department</button>
  </form>
</div>
@endsection
