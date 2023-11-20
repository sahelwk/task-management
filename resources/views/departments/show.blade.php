<!-- show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Department Details</h1>

  <div class="card mb-5">
    <div class="card-body">
      <h5 class="card-title"><strong>Department Name:</strong>-----------------------------------------------------------><em class="badge bg-pill bg-info text-light"style="font-size: 16px; font-weight: lighter">{{ $department->name }}</em></h5>
      <p class="card-text"><strong>Description:</strong></strong>-----------------------------------------------------------><em class="badge bg-pill bg-info text-light"style="font-size: 16px; font-weight: lighter"> {{ $department->description }}</em></p>
      <p class="card-text"><strong>Organizations:</strong> 
      @foreach($organizations as $org)
      <em class="badge bg-pill bg-info text-light"style="font-size: 16px; font-weight: lighter">  {{$org->name}}</em>
      @endforeach
</p>
    </div>
  </div>

  <a href="{{ route('departments.index') }}" class="btn btn-primary m-4">Back to Departments</a>
</div>
@endsection
