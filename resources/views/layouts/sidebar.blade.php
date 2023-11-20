<br>
<div class="sidebar">
    <ul class="nav navbar-nav side-nav fw-bold text-dark">


        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="bi bi-house-door"></i>
                <span><h3 class="btn btn-outline-danger p-2 m-0 d-block">Home</h3></span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{ route('organizations.index') }}">
                <i class="bi bi-building"></i>
                <span><h3 class="btn btn-outline-danger p-2 m-0 d-block">Organizations</h3></span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{ route('departments.index') }}">
                <i class="bi bi-people"></i>
                <span><h3 class="btn btn-outline-danger p-2 m-0 d-block">Departments</h3></span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{ route('projects.index') }}">
                <i class="bi bi-folder"></i>
                <span><h3 class="btn btn-outline-danger p-2 m-0 d-block">Projects</h3></span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{ route('reports.index') }}">
                <i class="bi bi-clipboard-check"></i>
                <span><h3 class="btn btn-outline-danger p-2 m-0 d-block">Report</h3></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reports.create') }}">
                <i class="bi bi-clipboard-check"></i>
                <span><h3 class="btn btn-outline-danger p-2 m-0 d-block">Create report</h3></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('tasks.index') }}">
                <i class="bi bi-clipboard-check"></i>
                <span><h3 class="btn btn-outline-danger p-2 m-0 d-block">Tasks</h3></span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('members.index') }}">
                <i class="bi bi-person"></i>
                <span><h3 class="btn btn-outline-danger p-2 m-0 d-block">Members</h3></span>
            </a>
        </li> --}}

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-gear"></i>
                <span><h3 class="btn btn-outline-danger p-2 m-0 d-block">Settings</h3></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="settingsDropdown">
                <a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a>
                <a class="dropdown-item" href="{{ route('permissions.index') }}">Permissions</a>
                <a class="dropdown-item" href="{{ route('users.index') }}">Users</a>
            </div>
        </li>


    </ul>
</div>
<div class="sidebar flex-grow-0">
    <ul class="nav navbar-nav side-nav fw-bold text-dark">
        <!-- Existing sidebar menu items -->


    </ul>
</div>
