@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <form action="{{ route('organizations.index') }}" method="GET" class="d-flex justify-content-center mb-4">
            <div class="row">
             <div class="col-md-12 d-flex">
                <div class="input-group">
                     <input type="text" name="search" class="form-control">
                      </div>
                         <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            <div class="page-header d-block text-dark">
                <h2 class="text-dark">Organizations</h2>
                @if($errors->any())
                    {{ implode('', $errors->all('<div>:success</div>'))}}
                @endif
            </div>

            <a href="{{route('organizations.create')}}" class="btn btn-success mb-2">Create New Organization</a>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-responsive table-fixed table-hover">
                    <thead>
                        <tr class="text-center thead-info">
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Create at</th>
                            <th>Updated at</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($organizations as $organization)
                            <tr>
                                <td>{{$organization->id}}</td>
                                <td>{{$organization->name}}</td>
                                <td>{{$organization->description}}</td>
                                <td>{{$organization->created_at->diffForHumans()}}</td>
                                <td>{{$organization->updated_at->diffForHumans()}}</td>
                                <td><a href="{{route('organizations.showItem', $organization->id)}}" class="btn btn-primary">Show</a></td>
                                <td><a href="{{route('organizations.edit', $organization->id)}}" class="btn btn-primary">Edit</a></td>
                                <td><a href="{{route('organizations.delete', $organization->id)}}" class="btn btn-primary">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="">
                {{ $organizations->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
            </div>
    <style>
        /* Add CSS for table scrolling */
        .table-fixed {
            width: 100%;
            overflow-x: auto;
        }
    </style>
@endsection
