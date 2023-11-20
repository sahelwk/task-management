@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Organization</</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div> 
    @endif

    <form method="POST" action="{{route('organizations.update',$organization) }}" enctype="multipart/form-data" class="pt-5 form-control">
        @csrf


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label"> Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$organization->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$organization->description}}">
                </div>
            </div>

        </div>
       
        <br>
        <button type="submit" class="btn btn-primary" class="form-control">Update</button>
        <a href="{{route('organizations.index')}}" class="btn btn-primary"class="form-control">Back to view</a>

</div>
@endsection
