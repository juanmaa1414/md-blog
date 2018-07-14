@extends('layout')
@section('title', 'Home')

@section('content')
	<section class="hero">
		<div class="hero-body">
			<div class="container">
				<h1 class="title leading">
					New note
				</h1>
			</div>
		</div>
	</section>

	<div class="container box">
		<form method="post" action="{{ url('/admin/notes/store') }}">
			{{-- TODO: CLRF guard. --}}
			
			<div class="columns">
				<div class="column">
					<div class="field">
						<label class="label">Title</label>
						<div class="control">
							<input class="input" type="text" name="title">
						</div>
					</div>
				</div>
				<div class="column">
					&nbsp;
				</div>
			</div>
			
		</form>
	</div>

@endsection
