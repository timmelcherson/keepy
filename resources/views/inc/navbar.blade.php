@guest

@else
<nav class="navbar navbar-expand-md navbar-dark rgu-bg-color position-fixed w-100">
    <div class="container rgu-bg-color">
        <a class="navbar-brand" href="{{ url('/home') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        

        <div class="collapse navbar-collapse d-flex justify-content-end nav-text" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                @if (Auth::user()->rights_add_key === 1)
                    <li class="nav-item">
                        <a class="nav-link" href="/addkey">Add new key</a>
                    </li>
                @endif
                
                @if (Auth::user()->rights_add_key === 1)
                    <li class="nav-item">
                        <a class="nav-link" href="/addfob">Add new fob</a>
                    </li>
                @endif
                
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-5">
                <!-- Authentication Links -->
                @guest
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li> --}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            
                            @if (Auth::user()->role == 'superuser')
                                <a class="dropdown-item" href="/dashboard">Dashboard</a>
                            @endif

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
@endguest
