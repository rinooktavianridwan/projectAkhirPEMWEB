<header>
    <nav>
        <div class="nav-content">
            <div class="logo">
                <img src="{{ asset('images/logo.svg') }}" alt="Background Image">
            </div>
            <div class="homepage">
                <a href="{{ url('/') }}">
                    Homepage
                </a>
            </div>
            <div class="about-us">About Us</div>
            <div class="cars">Cars</div>
            <div class="my-account">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}">
                            My Account
                        </a>
                    @else
                        <a href="{{ route('login') }}">
                            My Account
                        </a>
                    @endauth
                @endif
            </div>
            <div class="tombolLogin" >
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">
                        log out
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
