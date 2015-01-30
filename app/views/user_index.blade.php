@extends('_master')


@section('title')
	All the Users
@stop


@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h3>Users</h3>
	@foreach($users as $user)

		<div>
			<a href='/user/{{ $user->id }}'>{{ $user->email }}</a>
		</div>

	@endforeach
    </div>
</div>
</div>

@stop