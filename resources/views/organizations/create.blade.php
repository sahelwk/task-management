@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create page </</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('organizations.store') }}" enctype="multipart/form-data" class="pt-5">
        @csrf


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_number" class="form-label"> Name</label>
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Enter the name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="full_name" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" required placeholder="Description">
                </div>
            </div>

        </div>

        <br>
        <button type="submit" class="btn btn-primary" class="form-control">Create</button>
        <a href="{{route('organizations.index')}}" class="btn btn-primary"class="form-control">View</a>

</div>
@endsection
