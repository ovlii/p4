@extends('_master')

@section('title')
	Edit Location
@stop


@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
	{{ Form::model($location, ['method' => 'put', 'action' => ['LocationController@update', $location->id]]) }}

		<h3>Update: {{ $location->name }}</h3>

		<div class='form-group'>
			{{ Form::label('name', 'Location Name') }}<br/>
			{{ Form::text('name') }}<br/>
		</div>

		{{ Form::submit('Update', ['class' => 'btn btn-large btn-primary openbutton'])}}

	{{ Form::close() }}
    </div>
</div>
</div>

@stop