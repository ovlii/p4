@extends('_master')

@section('title')
	Create a new Category
@stop


@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h3>Create Category</h3>
	{{ Form::open(array('action' => 'CategoryController@store')) }}

		<div>
			{{ Form::label('name','Category Name') }}
			{{ Form::text('name') }}
		</div>

		<br><br>
		{{ Form::submit('Add Category', ['class' => 'btn btn-large btn-primary openbutton'])}}<br/>
	{{ Form::close() }}
    </div>

</div>
<br/>
</div>
@stop