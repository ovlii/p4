@extends('_master')

@section('title')
	Edit Category
@stop


@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">

	{{ Form::model($category, ['method' => 'put', 'action' => ['CategoryController@update', $category->id]]) }}

		<h3>Update: {{ $category->name }}</h3>

		<div class='form-group'>
			{{ Form::label('name', 'Category Name') }}<br/>
			{{ Form::text('name') }}<br/>
		</div>

		{{ Form::submit('Update', ['class' => 'btn btn-large btn-primary openbutton'])}}<br/>

	{{ Form::close() }}
    </div>

</div>
<br/>
</div>

@stop