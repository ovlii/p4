@extends('_master')


@section('title')
	All the categories
@stop


@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h3>Categories</h3>
	<a href='/category/create'>+ Add a new category</a>

	<br><br>

	@foreach($categories as $category)

		<div>
			<a href='/category/{{ $category->id }}'>{{ $category->name }}</a>
		</div>

	@endforeach
    </div>

</div>
<br/>
</div>
@stop