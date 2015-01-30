@extends('_master')


@section('title')
	All the Users
@stop


@section('content')

	<h2>Users</h2>

	<br><br>

	@foreach($users as $user)

		<div>
			<a href='/user/{{ $user->id }}'>{{ $user->email }}</a>
		</div>

	@endforeach

@stop