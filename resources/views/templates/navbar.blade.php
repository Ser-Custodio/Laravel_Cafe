<header>
    <nav class="navbar navbar-inverse navbar-static-top menu">
        <div class="container-fluid">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->
                <a class="navbar-brand" href="#">Coffee Machine</a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{route('machine')}}">Machine</a></li>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        @if(\Illuminate\Support\Facades\Auth::user()->role === 'admin')
                            <li><a href="{{url('boissons')}}">Boissons</a></li>
                            <li><a href="{{route('ingredients.index')}}">Ingredients</a></li>
                            <li><a href="{{url('monnayeur')}}">Monnayeur</a></li>
                            <li><a href="{{route('users.index')}}">Utilisateurs</a></li>
                        @endif
                        <li><a href="{{route('ventes.index')}}">Ventes</a></li>
                    @endif

                </ul>
            <!-- Right Side Of Navbar -->
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span>Login</a>
                            </li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="	display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>