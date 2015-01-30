@extends('_master')


@section('title')
	View Category
@stop


@section('content')

	<h2>Category: {{ $category->name }}</h2>

	<div>
	Created: {{ $category->created_at }}
	</div>

	<div>
	Last Updated: {{ $category->updated_at }}
	</div>

	{{---- Edit ----}}
	<a href='/tag/{{ $category->id }}/edit'>Edit</a>

	{{---- Delete -----}}
	{{ Form::open(['method' => 'DELETE', 'action' => ['CategoryController@destroy', $category->id]]) }}
		<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
	{{ Form::close() }}

@stop