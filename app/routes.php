<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



// Route::resource();

// Bind route parameters.
// Route::resource('path','ProductController');

// Show pages.
Route::get('/', 'TasksController@index');
Route::get('/create', 'TasksController@create');
Route::get('/edit/{Task}', 'TasksController@edit');
Route::get('/delete/{task}', 'TasksController@delete');

// Handle form submissions.
Route::post('/create', 'TasksController@handleCreate');
Route::post('/edit', 'TasksController@handleEdit');
Route::post('/delete', 'TasksController@handleDelete');

Route::controller('task', 'TaskController');

// Route::get('/task', 'TaskController@index');
// Route::get('/task/create', 'TaskController@create');
// Route::post('/task', 'TaskController@store');
// Route::get('/task/{task_id}', 'TaskController@show');
// Route::get('/task/{task_id}/edit', 'TaskController@edit');
// Route::put('/task/{task_id}', 'TaskController@update');
// Route::delete('/task/{task_id}', 'TaskController@destroy');

Route::get('/practice-reading', function() {

    # The all() method will fetch all the rows from a Model/table
    $tasks = Task::all();

    # Make sure we have results before trying to print them...
    if($tasks->isEmpty() != TRUE) {

        # Typically we'd pass $books to a View, but for quick and dirty demonstration, let's just output here...
        foreach($tasks as $task) {
            echo $task->name.'<br>';
        }
    }
    else {
        return 'No tasks found';
    }

});

Route::get('/practice-reading-one-task', function() {

    $task = Task::where('name', 'LIKE', '%tester%')->first();

    if($task) {
        return $task->name;
    }
    else {
        return 'Task not found.';
    }

    

});


Route::get('/practice-updating', function() {

    # First get a book to update
    $task = Task::where('name', 'LIKE', '%tester%')->first();

    # If we found the book, update it
    if($task) {

        # Give it a different title
        $task->name = 'testerUpdated';

        # Save the changes
        $task->save();

        return "Update complete; check the database to see if your update worked...";
    }
    else {
        return "Book not found, can't update.";
    }

});









