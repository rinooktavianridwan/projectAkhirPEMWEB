<header>
    <nav>
        <div class="nav-content">
            <div class="logo">
                <img src="{{ asset('images/logo.svg') }}" alt="Background Image">
            </div>
            <div class="btn btn-xs uppercase" >
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        Log in/Register
                    </a>
                @endauth
                </div>
            @endif
        </div>
    </nav>
</header>
