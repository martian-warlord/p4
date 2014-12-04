@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Create Task <small>and someday finish it!</small></h1>
    </div>

    <form action="{{ action('TasksController@handleCreate') }}" method="post" role="form">
        <div class="form-group">
            <label for="title">Name</label>
            <input type="text" class="form-control" name="name" />
        </div>
        <div class="checkbox">
            <label for="complete">
                <input type="checkbox" name="complete" /> Complete?
            </label>
        </div>
        <input type="submit" value="Create" class="btn btn-primary" />
        <a href="{{ action('TasksController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop