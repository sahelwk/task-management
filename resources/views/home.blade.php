@extends('layouts.app')

@section('content')

    <style>
        a {
            color: #FFFFFF;
            text-decoration: none;
        }
    </style>




        <div class="container  pb-5">
            {{-- @if(auth()->user()->is_admin) --}}

            @hasrole('Admin')
            @forelse($notifications as $notification)
                <div class="alert alert-success" role="alert">
                    @php $data = json_decode($notification->data) @endphp
                {{$notification->created_at }} User :{{$data->name}} Email:{{$data->email}}->has just registered.
                    {{-- [{{ $notification->created_at }}] User {{ $notification->data['name'] }} ({{ $notification->data['email'] }}) has just registered. --}}
                    <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                        Mark as read
                    </a>
                </div>

                @if($loop->last)
                    <a href="#" id="mark-all">
                        Mark all as read
                    </a>
                @endif
            @empty
               <font color='red'>There are no new notifications</font>
            @endforelse
            @endhasrole
        {{-- @endif --}}
            <div class="row">
               @hasrole('Admin')
                <div class="col-md-3">
                <a href="{{route('organizations.index')}}" class="text-decoration-none">
                    <div class="card bg-info  text-white text-center">

                        <div class="card-body">
                            <i class="fa-solid fa-globe fa-3x mb-3"></i>
                            <h5 class="card-title">{{$organizations}}</h5>
                            <h1 class="card-text"> Organization</h1>
                        </div>

                    </div>
                </a>
            </div>
            @endhasrole
            @hasrole('Manager|Admin')
            <div class="col-md-3">
            <a href="{{route('projects.index')}}" class="text-decoration-none">
                <div class="card bg-info text-white text-center">

                    <div class="card-body">
                        <i class="fa-solid fa-globe fa-3x mb-3"></i>
                        <h5 class="card-title">{{$projects->count('id')}}</h5>
                        <h1 class="card-text"> Projects</h1>
                    </div>

                </div>
            </a>

            </div>
  @endhasrole
  @hasrole('Team leads|Admin|Manager')
        <div class="col-md-3">
        <a href="{{route('users.index')}}" class="text-decoration-none">
            <div class="card bg-info text-white text-center">

                <div class="card-body">
                    <i class="fa-solid fa-globe fa-3x mb-3"></i>
                    <h5 class="card-title">{{$users->count('id')}}</h5>
                    <h1 class="card-text"> User</h1>
                </div>

            </div>
        </a>
    </div>
  @endhasrole
  @hasrole('Admin|Manager')
    <div class="col-md-3">
    <a href="{{route('departments.index')}}" class="text-decoration-none">
        <div class="card bg-info text-white text-center">

            <div class="card-body">
                <i class="fa-solid fa-globe fa-3x mb-3"></i>
                <h5 class="card-title">{{$departments->count('id')}}</h5>
                <h1 class="card-text"> Departments</h1>
            </div>

        </div>
    </a>
</div>
@endhasrole

            </div>
            <div class="row pt-5">
@hasrole('Admin|Manager|Team leads|Team Member')
            <div class="col-md-3">
                <a href="{{route('tasks.index')}}" class="text-decoration-none">
                    <div class="card bg-info text-white text-center">

                        <div class="card-body">
                            <i class="fa-solid fa-globe fa-3x mb-3"></i>
                            <h5 class="card-title">{{$tasks->count('id')}}</h5>
                            <h1 class="card-text"> Taks</h1>
                        </div>

                    </div>
                </a>
            </div>
            @endhasrole
        </div>
        </div>




<!--other part -->
@hasrole("Admin")
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('Admin.markNotification') }}", {
            method: 'POST',
            data: {
                _token,
                id
            }
        });
    }
    $(function() {
        $('.mark-as-read').click(function() {
            let request = sendMarkRequest($(this).data('id'));
            request.done(() => {
                $(this).parents('div.alert').remove();
            });
        });
        $('#mark-all').click(function() {
            let request = sendMarkRequest();
            request.done(() => {
                $('div.alert').remove();
            })
        });
    });
    </script>

@endhasrole
@endsection
