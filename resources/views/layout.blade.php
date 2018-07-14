<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title') - Easy Note</title>
	<link rel="stylesheet" href="{{ asset('vendor/bulma/bulma.min.css') }}">
	<script defer src="{{ asset('vendor/font-awesome/all.js') }}"></script>
</head>
<body>
	
	<style>
		body {
			background-color: #F5F6F7;
		}
		
		.content p {
			font-size: 1.2em;
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
		
		.tile a {
			font-size: 1.2rem;
		}
		
		.has-background-linksemi {
			background-color: #D4E7D7;
		}
		
		.art-detail {
			font-size: .740em;
		}
		
		.as-date {
			color: #888;
		}
	</style>
	
	<nav class="navbar has-background-linksemi" role="navigation" aria-label="main navigation">
		<div class="navbar-brand">
			<a class="navbar-item has-text-grey">
				My blog
			</a>
		</div>
		<div class="navbar-menu">
			<a class="navbar-item has-text-grey" href="{{ url("/notes/") }}">
				Blog archive
			</a>
			<a class="navbar-item has-text-grey">
				About
			</a>
		</div>
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
</body>
</html>
