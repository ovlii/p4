@extends('_master')

@section('title')
	Log in
@stop

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h3>Log in</h3>

{{ Form::open(array('url' => '/signup')) }}

 	{{ Form::label('First Name') }}<br/>
    {{ Form::text('first_name') }} <br/>

    {{ Form::label('Last Name') }}<br/>
    {{ Form::text('last_name') }} <br/>

    {{ Form::label('email') }}<br/>
    {{ Form::text('email') }} <br/>

    {{ Form::label('password') }}<br/>
    {{ Form::password('password') }}
    <small>Min 6 characters</small><br/>
    
    {{ Form::label('user_role', 'User Role') }}<br/>
    {{ Form::select('user_role', ['Admin'=>'Admin', 'User'=>'User']) }}<br/><br/>

    {{ Form::submit('Submit', ['class' => 'btn btn-large btn-primary openbutton'])}}<br/>

@foreach($errors->all() as $message)
	<div class='error'>{{ $message }}</div>
@endforeach

{{ Form::close() }}
    </div>

</div>
<br/>
</div>
        
@stop