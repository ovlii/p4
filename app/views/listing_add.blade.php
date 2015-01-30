@extends('_master')

@section('title')
	Add a new listing
@stop

@section('content')

	<h1>Add a new listing</h1>

	{{ Form::open(array('url' => '/listing/create')) }}

		{{ Form::label('short_title','Title') }}
		{{ Form::text('short_title'); }}

		{{ Form::label('location_id', 'Location') }}
		{{ Form::select('location_id', $locations); }}

		{{ Form::label('description','Description') }}
		{{ Form::text('description'); }}

		{{ Form::label('full_name','Full Name') }}
		{{ Form::text('full_name'); }}

		{{ Form::label('email_address','Email Address') }}
		{{ Form::text('email_address'); }}

		{{ Form::label('phone_number','Phone Number') }}
		{{ Form::text('phone_number'); }}

		{{ Form::hidden('enable_flag','Y'); }}

        @foreach($categories as $id => $category)
			{{ Form::checkbox('categories[]', $id); }} {{ $category }}
		@endforeach

		{{ Form::submit('Add'); }}

	{{ Form::close() }}

@stop
