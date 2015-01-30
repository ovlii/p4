@extends('_master')

@section('title')
	Log in
@stop

@section('content')
<h1>Sign up</h1>

@foreach($errors->all() as $message)
	<div class='error'>{{ $message }}</div>
@endforeach

{{ Form::open(array('url' => '/signup')) }}

 	{{ Form::label('First Name') }}
    {{ Form::text('first_name') }} <br/>

    {{ Form::label('Last Name') }}
    {{ Form::text('last_name') }} <br/>

    {{ Form::label('email') }}
    {{ Form::text('email') }} <br/>

    {{ Form::label('password') }}
    {{ Form::password('password') }} 
    <small>Min 6 characters</small><br/>
    
    {{ Form::label('user_role', 'User Role') }}
    {{ Form::select('user_role', ['Admin'=>'Admin', 'User'=>'User']) }}
    

    {{ Form::submit('Submit') }}

{{ Form::close() }}
@stop