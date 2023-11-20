<!-- show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="badge  bg-light text-dark border "style="font-size:25px; font-weight: lighter">User Details</h1>
   <div class="row">
    <div class="col-md-6">
  <div class="card mt-4">
    <div class="card-body">
      <h5 class="card-title">ID:-------------------------------------------------><strong class="badge bg-pill bg-info text-light" style="font-size: 16px; font-weight: lighter">{{ $user->id }}</strong></h5>
      <p class="card-text" ><strong>Organization Name :------------------------------------></strong><span class="badge bg-pill bg-info text-light"style="font-size: 16px; font-weight: lighter">{{ $user->organization->name  ?? ''}}</span></p>
      <p class="card-text"><strong>Department Name:----------------------------------------></strong><em class="badge bg-pill bg-info text-light"style="font-size: 16px; font-weight: lighter"> {{ $user->department->name  ?? '' }}</em></p>
      <p class="card-text"><strong>Project Name:-------------------------------------------></strong><em class="badge bg-pill bg-info text-light"style="font-size: 16px; font-weight: lighter"> {{ $user->project->name ?? ''}}</em></p>
      <p class="card-text"><strong>User Name:----------------------------------------------></strong><em class="badge bg-pill bg-info text-light"style="font-size: 16px; font-weight: lighter"> {{ $user->name  ?? '' }}</em></p>
      <p class="card-text"><strong>Role:-----------------------------------------------></strong>
      @foreach ($user->roles as $role)
            <tr>
            <span style="font-size: 16px; font-weight: lighter"
    class="badge bg-pill bg-info text-light ">
    {{$role->name}}</span>
                  @endforeach
       </p>
      <p class="card-text"><strong>Email:--------------------------></strong><strong class="badge bg-pill bg-info text-light"> {{ $user->email }}</strong></p>
    </div>
  </div>

  <a href="{{ route('users.index') }}" class="btn btn-secondary m-4">Back user</a>
</div>

<div class="col-md-6">
    <h1 class="btn btn-secondary mt-4">Assigned tasks To User:&nbsp&nbsp{{ $user->name }}</h1>
    <div class="card mt-4">
      <div class="card-body">
           @foreach ($user->tasks as $task)
           <span style="font-size: 16px; font-weight: lighter"
         class="badge bg-pill bg-success text-light ">
         {{$task->name}}</span>
           @endforeach


      </div>
    </div>


  </div>

</div>
</div>


@endsection
