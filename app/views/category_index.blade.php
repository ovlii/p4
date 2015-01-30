@extends('_master')


@section('title')
	All the categories
@stop


@section('content')

	<h2>Categories</h2>


	<a href='/category/create'>+ Add a new category</a>

	<br><br>

	@foreach($categories as $category)

		<div>
			<a href='/category/{{ $category->id }}'>{{ $category->name }}</a>
		</div>

	@endforeach

@stop