<nav class="navbar navbar-dark bg-dark navbar-expand-sm">
    <div class="container">
        @if(Auth::guard('web')->check())
            <a class="navbar-brand" href="{{ route('admin.home') }}">
                <i class="icon-graduation-cap navbar-icon"></i>
                {{ config('app.name') }}
            </a>
        @elseif(Auth::guard('student')->check())
            <a class="navbar-brand" href="{{ route('student.home') }}">
                <i class="icon-graduation-cap navbar-icon"></i>
                {{ config('app.name') }}
            </a>
        @else
            <a class="navbar-brand" href="{{ route('guest') }}">
                <i class="icon-graduation-cap navbar-icon"></i>
                {{ config('app.name') }}
            </a>
        @endif   

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <!-- Admin Links -->
                @if(Auth::guard('web')->check())
                @include('inc.navbar.admin')
                @endif

                <!-- Student Links -->
                @if(Auth::guard('student')->check())
                @include('inc.navbar.student')
                @endif
            </ul>
        </div>
    </div>
</nav>