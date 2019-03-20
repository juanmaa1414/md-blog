@extends('layout')
@section('title', 'Home')

@section('content')
	<br>
	@if(isset($firstTwo))
		<div class="columns">
			<div class="column is-two-thirds">
				<div class="box">
					<a href="notes/journalism-in-the-age-of-open-data" class="entry">{{ $firstTwo[0]->title }}</a>
				</div>
			</div>
			<div class="column">
				<div class="box">
					<a href="notes/2nd-test" class="entry">{{ $firstTwo[1]->title }}</a>
				</div>
			</div>
		</div>
	@endif

	<div class="tile is-ancestor">
		@foreach ($notes as $note)
			<div class="tile is-6 is-parent">
				<div class="tile is-child box">
					<small class="art-detail as-date">{{ $note->created_at->format('d/m/Y') }}</small>
					<br>
					<div class="entry">
						<a href="{{ url("/notes/{$note->slug}") }}">
							{{ $note->title }}
						</a>
					</div>
				</div>
			</div>
			
			{{-- Close and reopen tile groups at every two parents --}}
			@if ($loop->iteration % 2 == 0)
				</div>
				<div class="tile is-ancestor">
			@endif
		@endforeach
	</div>

	{{ $paginated->links('pagination.default') }}
@endsection
