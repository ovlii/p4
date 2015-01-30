@extends('_master')

@section('title')
	Create a new Location
@stop


@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h3>Create Locations</h3>

	{{ Form::open(array('action' => 'LocationController@store')) }}

		<div>
			{{ Form::label('name','Location Name') }}<br/>
			{{ Form::text('name') }}<br/>
		</div>

		<br><br>
		{{ Form::submit('Add Location', ['class' => 'btn btn-large btn-primary openbutton'])}}

	{{ Form::close() }}
    </div>
</div>
</div>

@stop