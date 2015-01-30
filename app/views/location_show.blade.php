@extends('_master')


@section('title')
	View Location
@stop


@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h3>Location: {{ $location->name }}</h3>

	<div>
	Created: {{ $location->created_at }}
	</div>

	<div>
	Last Updated: {{ $location->updated_at }}
	</div>

	{{---- Edit ----}}
	<a href='/location/{{ $location->id }}/edit'>Edit</a>
    </div>
</div>
</div>

@stop