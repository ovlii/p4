@extends('_master')

@section('title')
	Add a new listing
@stop

@section('content')

<div class="container">
<div class="row">
    <div class="col-md-8">
        <h3>Create a Listing</h3>

	{{ Form::open(array('url' => '/listing/create')) }}

		{{ Form::label('short_title','Title') }}<br/>
		{{ Form::text('short_title'); }} <br/>

		{{ Form::label('location_id', 'Location') }}<br/>
		{{ Form::select('location_id', $locations); }}<br/>

		{{ Form::label('description','Description') }}<br/>
		{{ Form::text('description'); }}<br/>

		{{ Form::label('full_name','Full Name') }}<br/>
		{{ Form::text('full_name'); }}<br/>

		{{ Form::label('email_address','Email Address') }}<br/>
		{{ Form::text('email_address'); }}<br/>

		{{ Form::label('phone_number','Phone Number') }}<br/>
		{{ Form::text('phone_number'); }}<br/>

		{{ Form::label('price','Price') }}<br/>
		{{ Form::text('price'); }}<br/>

		{{ Form::hidden('enable_flag','Y'); }}<br/>

        @foreach($categories as $id => $category)
			{{ Form::checkbox('categories[]', $id); }} {{ $category }}
		@endforeach<br/>

		{{ Form::submit('Add Listing!', ['class' => 'btn btn-large btn-primary openbutton'])}}

	{{ Form::close() }}
    </div>

</div>
<br/>
</div>

@stop
