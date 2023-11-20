@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a New Report</h1>
        <form action="{{ route('reports.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary m-4">Create Report</button>
        </form>
    </div>
@endsection
