@extends('layout')

@section('content')
<div class="jumbotron">
    <div class="container" style="color:grey;">
<h1>Deactivated Tasks</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created at</th>
                    <th>Complete?</th>
                    <th>Completed at</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <? if ($task['complete']) : ?>
                <tr>
                    <td>{{ $task['id'] }}</td>
                    <td><strong>{{ $task['name'] }}</strong></td>
                    <td>{{ $task['created_at'] }}</td>
                    <td>{{ $task['complete'] ? 'Yes' : 'No'}}</td>
                    <td>
                    	{{ $task['completed_at_time'] }}

                    </td>

                </tr><? endif; ?>
                @endforeach
                </table>
    </div>
    </div>
@stop