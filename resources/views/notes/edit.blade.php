@extends('layout')
@section('title', 'Notes')

@section('content')
	<section class="hero">
		<div class="hero-body">
			<div class="container">
				<h1 class="title leading">
					{{ isset($note) ? "Edit" : "New" }} note
				</h1>
			</div>
		</div>
	</section>

	<div class="container box">
		<form id="note-form" method="post" action="{{ url('/admin/notes/') }}{{$note->id ?? ''}}">
			{{ csrf_field() }}
			
			@isset($note)
				<input type="hidden" name="_method" value="patch">
			@endisset
			
			<div class="columns">
				<div class="column">
					<div class="field">
						<label class="label">Title</label>
						<div class="control">
							<input class="input" type="text" name="title" value="{{ $note->title ?? '' }}">
						</div>
					</div>
				</div>
				<div class="column">
					<div class="field">
						<label class="label">Tags</label>
						<div class="control">
							<input class="input" type="text" name="tags" id="tags" 
								   value="{{ $note->tagsAsCommaSeparated ?? '' }}">
						</div>
					</div>
				</div>
			</div>
			
			<div class="field">
				<label class="label">Content</label>
				<div class="content">
					<textarea id="note-content">{{ $note->content ?? '' }}</textarea>
				</div>
			</div>
			
			<div class="field has-addons is-pulled-right">
				@empty($note)
					<p class="control">
						<input type="submit" class="button" value="Draft" onclick="window.published = '0'">
					</p>
					<p class="control">
						<a class="button is-static">
							or
						</a>
					</p>
				@endisset
				<p class="control">
					<input type="submit" class="button is-link" value="Publish now" onclick="window.published = '1'">
				</p>
			</div>
			
		</form>
		
		<br><br>
	</div>
	
	@section('page-scripts')
		<script>
			function initPage() {
				// ===========================
				// Init the markup editor.
				// ===========================
				easyMDE = new EasyMDE({
					element: document.querySelector("#note-content"),
					spellChecker: false,
					renderingConfig: {
						singleLineBreaks: false
					}
				});

				// ===========================
				// Adding event listener to the form submit.
				// ===========================
				var form = document.querySelector('#note-form');
				form.addEventListener('submit', function(e) {
					e.preventDefault();

					var noteContent = easyMDE.value();
					this.appendDataField('content', noteContent);
					this.appendDataField('published', window.published);
					this.submit();
				}, false);

				// ===========================
				// Set tags autocomplete
				// ===========================
				var inputAuto = document.querySelector("#tags");
				var awesomplete = new Awesomplete(inputAuto, {
					filter: function(text, input) {
						return Awesomplete.FILTER_CONTAINS(text, input.match(/[^,]*$/)[0]);
					},

					item: function(text, input) {
						return Awesomplete.ITEM(text, input.match(/[^,]*$/)[0]);
					},

					replace: function(text) {
						var before = this.input.value.match(/^.+,\s*|/)[0];
						this.input.value = before + text;
					}
				});
				
				// ===========================
				// Adding event listener to the tags input.
				// ===========================
				inputAuto.addEventListener('keyup', function (e) {
					var isLetter = String.fromCharCode(e.keyCode).match(/(\w|\s)/g);
					var typed = this.value.match(/[^,\s]*$/)[0];
					
					if (typed.length < 2 || ! isLetter) {
						return;
					}
					
					fetch(app.BASE_URL + '/admin/notes/search_tags?q=' + typed)
						.then(function(response) {
							return response.json();
						})
						.then(function(data) {
							if (data.success) {
								awesomplete.list = data.result;
							}
						});
				});
			}

			document.addEventListener('DOMContentLoaded', function() {
				initPage();
			}, false);
		</script>
	
		<script src="{{ asset('vendor/easymde/easymde.min.js') }}"></script>
	@endsection
	
	@section('page-styles')
		<link rel="stylesheet" href="{{ asset('vendor/easymde/easymde.min.css') }}">
	@endsection

@endsection
