@extends('layout')

@section('content')
    <div class="page-header">
        <h1>All Tasks <small>Do them now!</small></h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('TasksController@create') }}" class="btn btn-primary">Create Task</a>
        </div>
    </div>

    @if ($tasks->isEmpty())
        <p>There are no tasks! :(</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Complete</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->complete ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ action('TasksController@edit') }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('TasksController@delete') }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop