<!-- index.blade.php -->

@extends('layouts.app')

@section('content')
  <h1>Members</h1>

  <a href="{{ route('members.create') }}" class="btn btn-primary">Create Member</a>

  @if (session('success'))
    <div class="alert alert-success mt-2">
      {{ session('success') }}
    </div>
  @endif



  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

  <table class="table mt-4">
    <thead>
      <tr>
        <th>ID</th>
        <th>Organization  </th>
        <th>Department  </th>
        <th>Project  </th>
        <th>Name</th>
        <th>Role</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($members as $member)
        <tr>
          <td>{{ $member->id }}</td>
          <td>{{ $member->organization->description}}</td>
          <td>{{ $member->department->name}}</td>
          <td>{{ $member->project->name}}</td>
          <td>{{ $member->name }}</td>
          <td>{{ $member->role }}</td>
          <td>{{ $member->email }}</td>
          <td>
            <a href="{{ route('members.show', $member->id) }}" class="btn btn-info btn-sm">Show</a>
            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{ route('members.delete', $member->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
