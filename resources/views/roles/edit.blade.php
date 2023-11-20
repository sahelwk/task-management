
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Form Edit</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="{{ route('roles.update', $role->id) }}" >
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputText">Name:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="name"  id="inputText" value="{{$role->name}}" placeholder="Enter role Name">
                        <div class="input-group-append">&nbsp; &nbsp;
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        @foreach ($permissions as $permission)
        <div class="form-check form-switch">
            <input id="link-checkbox" type="checkbox" name="permission[]"
            {{ in_array($permission->id, $rolepermissions) ? 'checked="checked"' : '' }}
                value="{{ $permission->name }}"
                class="form-check-input">
            <label for="link-checkbox "
                class="form-check-label ">{{ $permission->name }}</label>
        </div>
@endforeach







    </form>
</div>
@endsection








