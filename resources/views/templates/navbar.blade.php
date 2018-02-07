<header>
	<nav class="navbar navbar-inverse navbar-fixed-top menu">
		<div class="container-fluid">
			<div class="navbar-header">
				<!-- Collapsed Hamburger -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- Branding Image -->
				<a class="navbar-brand" href="#">Ilot 8</a>
			</div>
			<div class="collapse navbar-collapse" id="app-navbar-collapse">
				<!-- Left Side Of Navbar -->
				<ul class="nav navbar-nav">
					<li><a href="{{url('tableaubord')}}">Tableau de Bord</a></li>
					<li><a href="{{url('boissons')}}">Boissons</a></li>
					<li><a href="{{route('ingredients.index')}}">Ingredients</a></li>
					<li><a href="{{url('monnayeur')}}">Monnayeur</a></li>
					<li><a href="{{url('triBoissons')}}">triBoisson</a></li>
					<li><a href="{{route('ventes.index')}}">Ventes</a></li>
				</ul>

				<!-- Right Side Of Navbar -->
				<div class="collapse navbar-collapse" id="app-navbar-collapse">
					<!-- Right Side Of Navbar -->
					<ul class="nav navbar-nav navbar-right">
						<!-- Authentication Links -->
						@guest
						<li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
						<li><a href="{{ route('register') }}">Register</a></li>
						@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<ul class="dropdown-menu">
								<li>
									<a href="{{ route('logout') }}"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
									Logout
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="	display: none;">
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