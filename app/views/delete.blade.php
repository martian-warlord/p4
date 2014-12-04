@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Delete {{ $task->name }} <small>Are you sure?</small></h1>
    </div>
    <form action="{{ action('TasksController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="task" value="{{ $task->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('TasksController@index') }}" class="btn btn-default">No way!</a>
    </form>
@stop