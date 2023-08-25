<div class="navbar-area">

    <div class="mobile-nav">
        <a href="{{ url('/') }}" class="logo">
            <img src="assets/img/logo.png" alt="logo">
        </a>
    </div>

    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="client/assets/img/logo.png" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        {{--  @dd($categories);  --}}
                        @foreach ($category as $cat)
                            <li class="nav-item">
                                <a href="{{ url('/jobpostbycat/' . $cat->category) }}">{{ $cat->category }}</a>
                            </li>
                        @endforeach

                    </ul>
                    <div class="other-option">

{{--  @dd(Auth::user());  --}}
                        @if (Auth::user())
                            <a title="Hiring Info" href="{{ url('/hiring-info') }}"><img class="signin-btn"
                                    style="padding: 5px;
                            width: 38px;"
                                    src={{ asset('images/11.png') }} alt="logo"></a>
                            <a title="profile" href="{{ url('/profile') }}"><img class="signin-btn"
                                    style="padding: 5px;
                        width: 38px;"
                                    src={{ asset('images/4.png') }} alt="logo"></a>
                            <a href="{{ url('/client/logout') }}" class="signin-btn">Logout</a>
                        @else
                            <a href="{{ url('client/login') }}" class="signup-btn">Login</a>
                            <a href="{{ url('client/signup') }}" class="signin-btn">Register</a>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
