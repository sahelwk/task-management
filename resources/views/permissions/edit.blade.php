@extends('layouts.app')

@section('content')
<h1>Edit Permission</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('permissions.update', $permission) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $permission->name }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
