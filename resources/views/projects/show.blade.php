<!-- show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container pb-5 ">
  <h1 class="text-center">Project Details</h1>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title"><strong>Project ID:</strong>-----------------------------------------------------------><em class="badge bg-pill bg-info text-light"style="font-size: 16px; font-weight: lighter"> {{ $project->id }}</em></h5>
      <p class="card-text"><strong>Department Name:</strong>--------------------------------------------------------> <em class="badge bg-pill bg-info text-light"style="font-size: 16px; font-weight: lighter"> {{ $project->department->name }}</em></p>
      <p class="card-text"><strong> Project Name:</strong>----------------------------------------------------------><em class="badge bg-pill bg-info text-light"style="font-size: 16px; font-weight: lighter"> {{ $project->name }}</em></p>
    </div>
  </div>

 
</div>
<a href="{{ route('projects.index') }}" class="btn btn-primary m-4">Back to Projects</a>
@endsection
