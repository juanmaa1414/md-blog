@extends('layout')
@section('title', 'Home')

@section('content')
	<section class="hero">
		<div class="hero-body">
			<div class="container">
				<h1 class="title leading">
					Archive
				</h1>
			</div>
		</div>
	</section>

	<div class="tile is-ancestor">
		@foreach ($notes as $note)
			<div class="tile is-6 is-parent">
				<div class="tile is-child box">
					<small class="art-detail as-date">{{ $note->created_at->format('d/m/Y') }}</small>
					<br>
					<a href="{{ url('/notes/{$note->slug}') }}">
						{{ $note->title }}
					</a>
				</div>
			</div>
			
			{{-- Close and reopen tile groups at every two parents --}}
			@if ($loop->iteration % 2 == 0)
				</div>
				<div class="tile is-ancestor">
			@endif
		@endforeach
	</div>

	{{ $notes->links('pagination.default') }}
@endsection
