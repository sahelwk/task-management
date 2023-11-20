


@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Create Role</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="form-group col-lg-6">
                <label for="inputText">Name:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="name" id="inputText" placeholder="enter the role">
                    <div class="input-group-append">&nbsp; &nbsp;
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
             </div>
        </div>
        <div class="row">

        @foreach ($permissions as $permission)
    <div class="form-check form-switch">
        <input id="link-checkbox" type="checkbox" name="permission[]"
            value="{{ $permission->name }}"
            class="form-check-input">
        <label for="link-checkbox"
            class="form-check-label">{{ $permission->name }}</label>
    </div>
@endforeach
    </div>
    </form>
</div>
@endsection



