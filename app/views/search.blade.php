@extends('_master')

@section('title')
	Welcome to Ovlii's List
@stop

@section('head')

@stop

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h3>Search Listings</h3>
	{{ Form::open(array('url' => '/listing', 'method' => 'GET')) }}

		{{ Form::label('query','Search') }}<br/>

		{{ Form::text('query'); }}<br/><br/>

		{{ Form::submit('Search', ['class' => 'btn btn-large btn-primary openbutton'])}}<br/>

	{{ Form::close() }}
    </div>

</div>
<br/>
</div>

@stop