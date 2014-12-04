@extends('_master')


@section('title')
	View Task
@stop


@section('content')

	<h2>Task: {{ $task->name }}</h2>

	<div>
	Created: {{ $task->created_at }}
	</div>

	<div>
	Last Updated: {{ $task->updated_at }}
	</div>

	{{---- Edit ----}}
	<a href='/task/{{ $task->id }}/edit'>Edit</a>

	{{---- Delete -----}}
	{{ Form::open(['method' => 'DELETE', 'action' => ['TaskController@destroy', $task->id]]) }}
		<a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
	{{ Form::close() }}

@stop