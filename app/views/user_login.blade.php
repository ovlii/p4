@extends('_master')

@section('title')
	Log in
@stop

@section('content')

<h1>Log in</h1>

{{ Form::open(array('url' => '/login')) }}

    {{ Form::label('email') }}
    {{ Form::text('email') }}

    {{ Form::label('password') }}
    {{ Form::password('password') }}

    {{ Form::submit('Submit') }}

{{ Form::close() }}

<p>
	(admin@gmail.com/admin1234 for Admin ) <br/>
	(user@gmail.com/user1234 for User functionality)

</p>

@stop
