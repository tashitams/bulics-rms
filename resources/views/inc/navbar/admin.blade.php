<div class="dropdown show mr-2" id="navbar-item-mr-10">
    <a class="btn btn-secondary rounded-pill border-0 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Subjects') }}
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="{{ route('admin.subjects.create') }}"><i class="icon-plus-outline mr-1"></i> Add new subject</a>
        <a class="dropdown-item" href="{{ route('admin.subjects.index') }}"><i class="icon-eye mr-1"></i> View subject</a>
    </div>
</div>
<div class="dropdown show mr-2" id="navbar-item-mr-10">
    <a class="btn btn-secondary rounded-pill border-0 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Classes') }}
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="{{ route('admin.grades.create') }}"><i class="icon-plus-outline mr-1"></i> Add new class</a>
        <a class="dropdown-item" href="{{ route('admin.grades.index') }}"><i class="icon-eye mr-1"></i> View class</a>
    </div>
</div>
<div class="dropdown show mr-2" id="navbar-item-mr-10">
    <a class="btn btn-secondary rounded-pill border-0 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Students') }}
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="{{ route('admin.students.create') }}"><i class="icon-plus-outline mr-1"></i> Add new student</a>
        <a class="dropdown-item" href="{{ route('admin.students.index') }}"><i class="icon-eye mr-1"></i> View student</a>
        <a class="dropdown-item" href="{{ route('admin.students.upload') }}"><i class="icon-upload-1 mr-1"></i> Upload student</a>
    </div>
</div>
<div class="dropdown show mr-3" id="navbar-item-mr-10">
    <a class="btn btn-secondary rounded-pill border-0 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Results') }}
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="{{ route('admin.results.upload') }}"><i class="icon-upload-1 mr-1"></i> Upload result</a>
    </div>
</div>

@if(Auth::guard('web')->user()->avatar)
<li class="nav-item">
    <img src=" {{ asset('/storage/avatar/'. Auth::guard('web')->user()->avatar) }}" class="rounded-circle z-depth-0" alt="Avatar" width="35">
</li>
@else
<li class="nav-item">
    <img src="{{ asset('img/default.jpg') }}" class="rounded-circle z-depth-0" alt="Avatar" width="35">
</li>
@endif
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Hi {{ Auth::guard('web')->user()->name }}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('admin.profile') }}">
            <i class="icon-user"></i> Profile
        </a>
        <a class="dropdown-item" href="{{ route('admin.password') }}">
            <i class="icon-lock-1"></i> Change Password
        </a>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="icon-logout"></i> {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>