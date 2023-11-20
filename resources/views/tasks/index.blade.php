<!-- index.blade.php -->

@extends('layouts.app')

@section('content')

  <form action="{{ route('tasks.index') }}" method="GET" class="d-flex justify-content-center mb-4">
            <div class="row">
             <div class="col-md-12 d-flex">
                <div class="input-group">
                     <input type="text" name="search" class="form-control">
                      </div>
                         <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>

  <h1 class="text-center text-dark">Tasks</h1>
  @if (session('success'))
    <div class="alert alert-success mt-2">
      {{ session('success') }}
    </div>
  @endif

  <a href="{{ route('tasks.create') }}" class="btn btn-primary m-3 ">Create Task</a>
        <div class="container  text-center mb-5 pb-5 ">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="bg-success text-center text-white"> TODO</h1>
                    @foreach($todoTasks as $todo)
                    <div class="card form-group ">
                        <div class="header text-center form-control ">
                            {{-- {{$todo->name}} --}}
                            @if ($todo->file_path)
                            <div>
                                <a href="{{ asset($todo->file_path) }}" target="_blank">View File</a>
                            </div>
                        @else
                            <p>No file uploaded.</p>
                        @endif
                        </div>
                        <div class="card-body border m-4 ">
                        {{$todo->description}}
                    </div>
                        <div class="footer text-center mb-3">
                        <a href="{{route('tasks.edit',$todo->id)}}" class="btn btn-success">Edit</a>
                        <a href="{{route('tasks.delete',$todo->id)}}" class="btn btn-danger">Delete</a>
                        <a href="{{route('tasks.show',$todo->id)}}" class="btn btn-primary">Read more</a>
                    </div>

                </div>


     @endforeach
    </div>
                <div class="col-md-4 form-group">

                    <h1 class="bg-success text-center text-white">In Progress</h1>
                    @foreach($inProgressTasks as $inProgress)
                    <div class="card form-control">
                        <div class="header text-center">
                            {{-- {{$inProgress->name}}<br> --}}
                            @if ($inProgress->file_path)
                            <div>
                                <a href="{{ asset($inProgress->file_path) }}" target="_blank">View File</a>
                            </div>
                        @else
                            <p>No file uploaded.</p>
                        @endif
                        </div>
                        <div class="card-body border m-4">

                            {{$inProgress->description}}<br>

                    </div>
                        <div class="footer text-center mb-3">
                        <a href="{{route('tasks.edit',$inProgress->id)}}" class="btn btn-success">Edit</a>
                        <a href="{{route('tasks.delete',$inProgress->id)}}" class="btn btn-danger">Delete</a>
                        <a href="{{route('tasks.show',$inProgress->id)}}" class="btn btn-primary">Read more</a>
                    </div>
                </div>

                        @endforeach
                    </div>
                <div class="col-md-4 form-group">
                 <h1 class="bg-success text-center text-white">Done</h1>

                    @foreach($doneTasks as $done)
                    <div class="card">
                        <div class="header text-center form-control">
                            {{-- {{$done->name}} --}}
                            @if ($done->file_path)
                            <div>
                                <a href="{{ asset($done->file_path) }}" target="_blank">View File</a>
                            </div>
                        @else
                            <p>No file uploaded.</p>
                        @endif
                        </div>
                        <div class="card-body border m-4">

                            {{$done->description}}<br>

                    </div>
                        <div class="footer text-center mb-3">
                        <a href="{{route('tasks.edit',$done->id)}}" class="btn btn-success">Edit</a>
                        <a href="{{route('tasks.delete',$done->id)}}" class="btn btn-danger">Delete</a>
                        <a href="{{route('tasks.show',$done->id)}}" class="btn btn-primary">Read more</a>
                    </div>
                </div>

                        @endforeach
                </div>
            </div>
        </div>
@endsection
