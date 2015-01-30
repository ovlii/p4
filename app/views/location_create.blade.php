@extends('_master')

@section('title')
	Create a new Location
@stop


@section('content')

	<h1>Create a Location</h1>

	{{ Form::open(array('action' => 'LocationController@store')) }}

		<div>
			{{ Form::label('name','Location Name') }}
			{{ Form::text('name') }}
		</div>

		<br><br>
		{{ Form::submit('Add Location') }}

	{{ Form::close() }}

@stop