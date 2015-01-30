@extends('_master')


@section('title')
	View Location
@stop


@section('content')

	<h2>Location: {{ $location->name }}</h2>

	<div>
	Created: {{ $location->created_at }}
	</div>

	<div>
	Last Updated: {{ $location->updated_at }}
	</div>

	{{---- Edit ----}}
	<a href='/location/{{ $location->id }}/edit'>Edit</a>

	{{---- Delete -----}}
	{{ Form::open(['method' => 'DELETE', 'action' => ['LocationController@destroy', $location->id]]) }}
		<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
	{{ Form::close() }}

@stop