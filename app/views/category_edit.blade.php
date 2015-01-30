@extends('_master')

@section('title')
	Edit Category
@stop


@section('content')

	{{ Form::model($category, ['method' => 'put', 'action' => ['Category`Controller@update', $category->id]]) }}

		<h2>Update: {{ $category->name }}</h2>

		<div class='form-group'>
			{{ Form::label('name', 'Category Name') }}
			{{ Form::text('name') }}
		</div>

		{{ Form::submit('Update') }}

	{{ Form::close() }}


	{{---- DELETE -----}}
	{{ Form::open(['method' => 'DELETE', 'action' => ['CategoryController@destroy', $category->id]]) }}
		<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
	{{ Form::close() }}

@stop