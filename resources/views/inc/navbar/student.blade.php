<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Hi {{ Auth::guard('student')->user()->name }} 
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('student.logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="icon-logout"></i> {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>