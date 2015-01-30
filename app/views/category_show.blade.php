@extends('_master')


@section('title')
	View Category
@stop


@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h3>Category: {{ $category->name }}</h3>

	<div>
	Created: {{ $category->created_at }}
	</div>

	<div>
	Last Updated: {{ $category->updated_at }}
	</div>

	{{---- Edit ----}}
	<a href='/category/{{ $category->id }}/edit'>Edit</a>
    </div>

</div>
<br/>
</div>
@stop