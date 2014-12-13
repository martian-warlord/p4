@extends('layout')

@section('content')


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Created at</th>
                    <th>Name</th>
                    <th>Complete?</th>
                    <th>Completed at</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $task['id'] }}</td>
                    <td><strong>{{ $task['name'] }}</strong></td>
                    <td>{{ $task['created_at'] }}</td>
                    <td>{{ $task['complete'] ? 'Yes' : 'No'}}</td>
                    <td><? if ($task['complete']) : ?>
                    	{{ $task['completed_at_time'] }}
<? else : ?>
    <p> </p>
<? endif; ?>
                    </td>
                    <td>
<a href="{{ $task['/edit'] }}" class="btn btn-default">Edit</a>
<a href="{{ $task['/delete'] }}" class="btn btn-danger">Delete</a>

                    </td>
                </tr>
                @endforeach
                </table>


@stop