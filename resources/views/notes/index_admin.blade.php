@extends('layout')
@section('title', 'Home')

@section('content')
	<br>

	<table class="table is-hoverable is-fullwidth">
		<thead>
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>Date</th>
				<th>Status</th>
				<th>Option</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($notes as $note)
				<tr>
					<td>{{ $note->title }}</td>
					<td>{{ $note->user->name }}</td>
					<td>{{ $note->created_at->format('Y/m/d') }}</td>
					<td>{{ $note->published ? 'published' : 'unpublished' }}</td>
					<td>
						<a class="button is-small" href="{{ url("/admin/notes/{$note->id}/edit") }}">
							<span class="icon is-small">
								<i class="fas fa-edit"></i>
							</span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ $notes->links('pagination.default') }}
@endsection
