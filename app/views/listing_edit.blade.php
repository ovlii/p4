@extends('_master')

@section('title')
	Edit
@stop

@section('head')

@stop

@section('content')

	<h1>Edit</h1>
	<h2>{{{ $listing['title'] }}}</h2>

	{{---- EDIT -----}}
	{{ Form::open(array('url' => '/listing/edit')) }}

		{{ Form::hidden('id',$listing['id']); }}

		<div class='form-group'>
			{{ Form::label('title','Title') }}
			{{ Form::text('title',$listing['title']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('location_id', 'Location') }}
			{{ Form::select('location_id', $locations, $listing->location_id); }}
		</div>

		<div class='form-group'>
			@foreach($categories as $id => $category)
				{{ Form::checkbox('categories[]', $id, $listing->categories->contains($id)); }} {{ $category }}
				&nbsp;&nbsp;&nbsp;
			@endforeach
		</div>

		{{ Form::submit('Save'); }}

	{{ Form::close() }}

	<div>
		{{---- DELETE -----}}
		{{ Form::open(array('url' => '/listing/delete')) }}
			{{ Form::hidden('id',$listing['id']); }}
			<button onClick='parentNode.submit();return false;'>Delete</button>
		{{ Form::close() }}
	</div>


@stop