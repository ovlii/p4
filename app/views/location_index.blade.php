@extends('_master')


@section('title')
	All the Locations
@stop


@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h3>Locations</h3>
	<a href='/location/create'>+ Add a new location</a>

	<br><br>

	@foreach($locations as $location)

		<div>
			<a href='/location/{{ $location->id }}'>{{ $location->name }}</a>
		</div>

	@endforeach
    </div>
</div>
</div>

@stop