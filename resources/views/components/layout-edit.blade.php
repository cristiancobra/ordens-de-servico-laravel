<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/340c24fbce.js" crossorigin="anonymous"></script>
		@vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])

        <title>
			TELECONTROL
		</title>

    </head>

    <body>
		<div id='nav-container' class="container">
			<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
				<div class="container">
					<a href="{{ url('/') }}">
						<img src='{{ asset('storage/logo-example.png') }}'>
					</a>
					<div class="collapse navbar-collapse ms-4" id="navbarSupportedContent">
						<!-- Left Side Of Navbar -->
						<ul class="navbar-nav me-auto">
							<li class="nav-item">
								<a class="nav-link" href="{{ route('dashboard') }}">
									PAINEL
								</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" href="{{ route('customer.index') }}">
									Clientes
								</a>
							</li>
							 <li class="nav-item">
								<a class="nav-link" href="{{ route('product.index') }}">
									Produtos
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('order.index') }}">
									Ordens
								</a>
							</li>
						</ul>
	
						<!-- Right Side Of Navbar -->
						<ul class="navbar-nav ms-auto">
							<!-- Authentication Links -->
							@guest
								@if (Route::has('login'))
									<li class="nav-item">
										<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
									</li>
								@endif
	
								@if (Route::has('register'))
									<li class="nav-item">
										<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
									</li>
								@endif
							@else
								<li class="nav-item dropdown">
									<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
										{{ Auth::user()->name }}
									</a>
	
									<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="{{ route('logout') }}"
										   onclick="event.preventDefault();
														 document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
										</a>
	
										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</div>
								</li>
							@endguest
						</ul>
					</div>
				</div>
			</nav>
		</div>

		<div id='content-container' class="container">

			<div id='form-container' class='row mt-5 mb-5 form-container'>
				{{ $form }}
			</div>

			<div id='message-container'>
				{{ $errors }}
			</div>

		</div>

		{{ $scripts }}
		
    </body>
</html>
