<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title') - {{ config('app.name', 'Blog') }}</title>
	<link rel="stylesheet" href="{{ asset('vendor/bulma/bulma.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/toastify-js/toastify.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/awesomplete/awesomplete.css') }}">
	@yield('page-styles')
	
	<script defer src="{{ asset('vendor/font-awesome/all.js') }}"></script>
	<script defer src="{{ asset('vendor/toastify-js/toastify.js') }}"></script>
	<script defer src="{{ asset('vendor/awesomplete/awesomplete.min.js') }}"></script>
	<script defer src="{{ asset('js/js_enhancing.js') }}"></script>
	<script defer src="{{ asset('js/app.js') }}"></script>
</head>
<body>
	
	<style>
		body {
			background-color: #F5F6F7;
		}
		
		.title.leading {
			font-size: 2.6rem;
		}
		
		.hero.is-semi .hero-body {
			padding-bottom: 6rem;
			padding-top: 6rem;
		}
		
		.tile.is-parent {
			padding: .75rem;
		}
		
		.entry {
			font-size: 1.2rem;
		}
		
		.has-background-linksemi {
			background-color: #E3EBED;
		}
		
		.art-detail {
			font-size: .740em;
		}
		
		.as-date {
			color: #888;
		}
		
		/**
		 * CSS libraries override
		 */
		
		/* Fix for editor mismatching lines. */
		.content pre.CodeMirror-line {
			margin-bottom: initial;
		}
		
		.toastify.on {
			opacity: 1;
			z-index: 100;
		}
		
		.awesomplete {
			display: block;
			position: relative;
		}
	</style>
	
	<nav class="navbar has-background-linksemi" role="navigation" aria-label="main navigation">
		<div class="navbar-brand">
			<a class="navbar-item has-text-grey">
				{{ config('app.name', 'Blog') }}
			</a>
		</div>
		
		<div class="navbar-menu">
			<a class="navbar-item has-text-grey" href="{{ url('/notes/') }}">
				Blog archive
			</a>
			<a class="navbar-item has-text-grey">
				About
			</a>
		</div>
		
		@auth
			<div class="navbar-item has-dropdown is-hoverable is-right">
				<a class="navbar-link" href="#">
					{{ Auth::user()->name }}
				</a>
				<div class="navbar-dropdown is-boxed">
					<a class="navbar-item" href="#" onclick="document.getElementById('logout-form').submit()">
						Logout
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</div>
			</div>
		@endauth
		
	</nav>

	<div class="container">
		@yield('content')
	</div>
	
	<footer class="footer">
		<div class="content has-text-centered">
			<p>
				<strong>MD Blog</strong> by <a href="https://nothing.com">their autors</a>. The source code is licensed
				<a href="http://test.org">EG...</a>. The website content
				is licensed <a href="http://test.org">Character of license</a>.
			</p>
		</div>
	</footer>
	
	<script>
		var app = {};
		
		app.BASE_URL = "{{ url('/') }}";
		app.currentNotifications = {!! json_encode(\Lloople\Notificator\Notificator::toArray()) !!};
	</script>
	
	@yield('page-scripts')
</body>
</html>
