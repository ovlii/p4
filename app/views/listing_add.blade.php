@extends('_master')

@section('title')
	Add a new listing
@stop

@section('content')

	<h1>Add a new listing</h1>

	{{ Form::open(array('url' => '/listing/create')) }}

		{{ Form::label('short_title','Title') }}
		{{ Form::text('short_title'); }} <br/>

		{{ Form::label('location_id', 'Location') }}
		{{ Form::select('location_id', $locations); }}<br/>

		{{ Form::label('description','Description') }}
		{{ Form::text('description'); }}<br/>

		{{ Form::label('full_name','Full Name') }}
		{{ Form::text('full_name'); }}<br/>

		{{ Form::label('email_address','Email Address') }}
		{{ Form::text('email_address'); }}<br/>

		{{ Form::label('phone_number','Phone Number') }}
		{{ Form::text('phone_number'); }}<br/>

		{{ Form::hidden('enable_flag','Y'); }}<br/>

        @foreach($categories as $id => $category)
			{{ Form::checkbox('categories[]', $id); }} {{ $category }}
		@endforeach<br/>

		{{ Form::submit('Add'); }}

	{{ Form::close() }}

@stop
