<!-- show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container pb-5 ">
  <h1 class="text-center">Organizations Details</h1>

<table class="table table-bordered">

<thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
    </tr>
</thead>

<tbody>
<tr>
<td>{{$organization->id}}</td>
<td>{{$organization->name}}</td>
<td>{{$organization->description}}</td>
</tr>
</tbody>
</table>



</div>
<a href="{{ route('organizations.index') }}" class="btn btn-primary m-4">Back to organizations</a>
@endsection
