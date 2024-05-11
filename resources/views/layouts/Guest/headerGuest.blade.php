<header>
    <nav>
        <div class="nav-content">
            <div class="logo">
                <img src="{{ asset('images/logo.svg') }}" alt="Background Image">
            </div>
            <div class="homepage">Homepage</div>
            <div class="about-us">About Us</div>
            <div class="cars">Cars</div>
            <div class="my-account">My Account</div>
            <div class="tombolLogin" >
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        Log in
                    </a>
                @endauth
                </div>
            @endif

        </div>
    </nav>
</header>
