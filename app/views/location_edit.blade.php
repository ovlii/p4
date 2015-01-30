@extends('_master')

@section('title')
	Edit Location
@stop


@section('content')

	{{ Form::model($location, ['method' => 'put', 'action' => ['LocationController@update', $location->id]]) }}

		<h2>Update: {{ $location->name }}</h2>

		<div class='form-group'>
			{{ Form::label('name', 'Location Name') }}
			{{ Form::text('name') }}
		</div>

		{{ Form::submit('Update') }}

	{{ Form::close() }}


@stop