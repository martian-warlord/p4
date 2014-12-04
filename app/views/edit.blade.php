@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Edit Task <small>Go on, mark it complete!</small></h1>
    </div>

    <form action="{{ action('TasksController@handleEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $task->id }}">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $task->name }}" />
        </div>
        <div class="checkbox">
            <label for="complete">
                <input type="checkbox" name="complete" {{ $task->complete ? 'checked' : '' }} /> Complete?
            </label>
        </div>
        <input type="submit" value="Save" class="btn btn-primary" />
        <a href="{{ action('TasksController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop