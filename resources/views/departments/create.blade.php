  

@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="text-dark">Create Department</h1>

  <form action="{{ route('departments.store') }}" method="POST">
    @csrf

    <div class="form-group">
      <label for="name" class="text-dark">Name:</label>
      <input type="text" id="name" name="name" class="form-control" required placeholder="department name">
    </div>

    <div class="form-group">
      <label for="description" class="text-dark">Description:</label>
      <textarea id="description" name="description" class="form-control" required placeholder="department descriptions"></textarea>
    </div>

    <!-- Assuming you have a foreign key 'org_id' in the 'departments' table -->
    <div class="form-group">
      <label for="org_id" class="text-dark">Organization Name</label>
     

      <select name="org_id"class="form-control">
        @foreach ($organizations as $organization)

        <option value="{{$organization->id}}">{{$organization->name}}</option>
        @endforeach

      </select>
    </div>

    <button type="submit" class="btn btn-primary m-3">Create Department</button>
  </form>
</div>
@endsection
