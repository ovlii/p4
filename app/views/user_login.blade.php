@extends('_master')

@section('title')
	Log in
@stop

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h3>Log in</h3>

{{ Form::open(array('url' => '/login')) }}
    {{ Form::label('email') }}<br/>
    {{ Form::text('email') }} <br/>

        {{ Form::label('password') }}<br/>
    {{ Form::password('password') }}<br/><br/>
    {{ Form::submit('Submit', ['class' => 'btn btn-large btn-primary openbutton'])}}
{{ Form::close() }} 
    </div>

</div>
<br/>
<a href="/signup">Register User</a>
</div>





@stop

