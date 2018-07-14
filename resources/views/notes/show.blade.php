@extends('layout')
@section('title', $note->title)

@section('content')
	<section class="hero is-semi">
		<div class="hero-body">
			<div class="container">
				<h1 class="title leading">
					{{ $note->title }}
				</h1>
			</div>
		</div>
	</section>

	<div class="columns">
		<div class="column is-two-thirds">
			<div class="box">
				<div class="content">
					{!! $note->content !!}
				</div>
				<small class="art-detail">WRITTEN BY </small> {{ $note->user->name }}
				<br>
				&lt;{{ $note->user->email }}&gt;
			</div>
		</div>
		<div class="column">
			&nbsp;
		</div>
	</div>
@endsection
