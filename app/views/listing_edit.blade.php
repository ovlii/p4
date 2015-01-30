@extends('_master')

@section('title')
	Edit
@stop

@section('head')

@stop

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h3>Edit {{{ $listing['title'] }}}</h3>

	{{---- EDIT -----}}
	{{ Form::open(array('url' => '/listing/edit')) }}

		{{ Form::hidden('id',$listing['id']); }}

		<div class='form-group'>
			{{ Form::label('title','Title') }}<br/>
			{{ Form::text('title',$listing['title']); }}<br/>
		</div>

		<div class='form-group'>
			{{ Form::label('location_id', 'Location') }}<br/>
			{{ Form::select('location_id', $locations, $listing->location_id); }}<br/>
		</div>

		<div class='form-group'>
			@foreach($categories as $id => $category)
				{{ Form::checkbox('categories[]', $id, $listing->categories->contains($id)); }} {{ $category }}
				&nbsp;&nbsp;&nbsp;
			@endforeach<br/>
		</div>

		{{ Form::submit('Save', ['class' => 'btn btn-large btn-primary openbutton'])}}<br/>

	{{ Form::close() }}
    </div>

</div>
</div>

@stop