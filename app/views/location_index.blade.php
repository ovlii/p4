@extends('_master')


@section('title')
	All the Locations
@stop


@section('content')

	<h2>Locations</h2>


	<a href='/location/create'>+ Add a new location</a>

	<br><br>

	@foreach($locations as $location)

		<div>
			<a href='/location/{{ $location->id }}'>{{ $location->name }}</a>
		</div>

	@endforeach

@stop