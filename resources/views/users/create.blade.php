@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-dark"> Create user</h2>

@include('layouts.form_error')

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group text-dark">
                    <label for="form_number">Name</label>
                    <input type="text" class="form-control" id="form_number" name="name" required value="{{old('name')}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group text-dark">
                    <label for="full_name">Email</label>
                    <input type="text" class="form-control" id="full_name" name="email" required value="{{old('email')}}">
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group text-dark">
                    <label for="org_id">Organization:</label>


                    <select name="org_id" class="form-control">
                      @foreach ($organizations as $organization)

                      <option value="{{$organization->id}}">{{$organization->name}}</option>
                      @endforeach

                    </select>

                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group text-dark">
                    <label for="project_id">Project:</label>
                    <select name="project_id" class="form-control">
                      @foreach ($projects as $project)

                      <option value="{{$project->id}}">{{$project->name}}</option>
                      @endforeach

                    </select>
                  </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group text-dark">
                    <label for="task_id">Task:</label>
                     <select name="task_id" class="form-control">
                      @foreach ($tasks as $task)

                      <option value="{{$project->id}}">{{$task->name}}</option>
                      @endforeach

                    </select>
                  </div>
            </div>

            <div class="col-md-6">
                <div class="form-group text-dark">
                    <label for="dep_id">Department:</label>

                    <select name="dep_id" class="form-control">
                      @foreach ($departments as $department)

                      <option value="{{$department->id}}">{{$department->name}}</option>
                      @endforeach

                    </select>
                  </div>
            </div>
        </div>


            <div class="row">
            <div class="col-md-6">
                <div class="form-group text-dark">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="Password" name="password">
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group text-dark">
                    <label for="password_confirmation"> Comform Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
            </div>
            </div>

            <div class="row">
<div class="col-md-6">
                <div class="form-group text-dark">
                    <label for="role">Roles</label>
                    <select id="role" name="roles[]" multiple='multiple' class="form-select form-select-sm" aria-label=".form-select-sm example">
                        @foreach ($roles as $role)
                         <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                     </select>
                 </div>
            </div>

            <div class="col-md-6">
                <div class="form-group text-dark">
                <label for="status">Status:</label>
                <select name = "status" class="form-control">
                            <option value ="1">Active</option>
                            <option value ="0">Not Active</option>
                              </select>
                </div>
            </div>

</div>
<div class="col-md-6">
                <div class="form-group text-dark">
                    <label for="photo">Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>
            </div>

        <button style="margin-top:7px; " type="submit" class="btn btn-primary btn-block"> Create</button>
    </form>
</div>
@endsection
