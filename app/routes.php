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
// Route::get('/', function() {

//         // Show a listing of tasks.
//         $tasks = Task::all();

//         return View::make('task_index', compact('tasks'));
// });


//route for adding tasks
Route::get('/add', function() {

echo 'add task';
});

//route for adding tasks
Route::get('/edit', function() {

echo 'edit task';
});

//route for adding tasks
Route::get('/delete', function() {

echo 'delete task';
});




// route for completed tasks
Route::get('/completed', function() {

    # The all() method will fetch all the rows from a Model/table
    $tasks = Task::all();

    # Make sure we have results before trying to print them...
    if($tasks->isEmpty() != TRUE) {

        # Typically we'd pass $books to a View, but for quick and dirty demonstration, let's just output here...
        foreach($tasks as $task) {  if ($task->complete == 1)
            {
            echo 'task id: '.$task->id.'<br>'.'created at: '.$task->created_at.'<br>'.'task name: '.$task->name.'<br>'.'task complete?: '.$task->complete.'<br><br><br>';
        }
        }
    }
    else {
        return 'No complete tasks found';
    }


});

//route for incomplete tasks
Route::get('/incomplete', function() {

    # The all() method will fetch all the rows from a Model/table
    $tasks = Task::all();

    # Make sure we have results before trying to print them...
    if($tasks->isEmpty() != TRUE) {

        # Typically we'd pass $books to a View, but for quick and dirty demonstration, let's just output here...
        foreach($tasks as $task) {  if ($task->complete == 0)
            {
            echo 'task id: '.$task->id.'<br>'.'created at: '.$task->created_at.'<br>'.'task name: '.$task->name.'<br>'.'task complete?: '.$task->complete.'<br><br><br>';
        }
        }
    }
    else {
        return 'No incomplete tasks found';
    }


});

//route for incomplete tasks
Route::get('/all', function() {

    # The all() method will fetch all the rows from a Model/table
    $tasks = Task::all();

    # Make sure we have results before trying to print them...
    if($tasks->isEmpty() != TRUE) {

        # Typically we'd pass $books to a View, but for quick and dirty demonstration, let's just output here...
        foreach($tasks as $task) {
            echo 'task id: '.$task->id.'<br>'.'created at: '
            .$task->created_at.'<br>'.'task name: '
            .$task->name.'<br>'.'task complete?: '
            .$task->complete. '<br>'
            .' task completed at: '.$task->completed_at_time
            .'<br><br><br>';
        }
    }
    else {
        return 'No tasks found';
    }
});


Route::get('/practice-creating', function() {
    # Instantiate a new Task model class
    $task = new Task();
    # Set
    $task->name = 'walk the dog';
    # Set
    $task->complete = 0;
    # This is where the Eloquent ORM magic happens
    $task->save();
    echo 'test task1 has been added! Check your database to see...'.'<br>';

   $task2 = new Task();
    # Set
    $task2->name = 'make lunch';
    # Set
    $task2->complete = 0;
    # This is where the Eloquent ORM magic happens
    $task2->save();
    echo 'test task2 has been added! Check your database to see...'.'<br>';


   $task3 = new Task();
    # Set
    $task3->name = '500 jumping jacks';
    # Set
    $task3->complete = 1;
    # This is where the Eloquent ORM magic happens
    $task3->save();
    echo 'test task3 has been added! Check your database to see...'.'<br>';


   $task4 = new Task();
    # Set
    $task4->name = 'jump in the lake';
    # Set
    $task4->complete = 1;
    # This is where the Eloquent ORM magic happens
    $task4->save();
    echo 'test task4 has been added! Check your database to see...'.'<br>';


});



/*-------------------------------------------------------------------------------------------------
untested - user routes that need work - examples from foo books example
-------------------------------------------------------------------------------------------------*/
// Homepage
Route::get('/', function() {
    return View::make('index');
});


// # User: Sign up
// Route::get('/signup',
//     array(
//         'before' => 'guest',
//         function() {
//             return View::make('signup');
//         }
//     )
// );
// # User: Sign up
// Route::post('/signup',
//     array(
//         'before' => 'csrf',
//         function() {
//             $user = new User;
//             $user->email    = Input::get('email');
//             $user->password = Hash::make(Input::get('password'));
//             # Try to add the user
//             try {
//                 $user->save();
//             }
//             # Fail
//             catch (Exception $e) {
//                 return Redirect::to('/signup')
//                     ->with('flash_message', 'Sign up failed; please try again.')->withInput();
//             }
//             # Log the user in
//             Auth::login($user);
//             return Redirect::to('/list')
//                 ->with('flash_message', 'Welcome!');
//         }
//     )
// );
// # User: Log in
// Route::get('/login',
//     array(
//         'before' => 'guest',
//         function() {
//             return View::make('login');
//         }
//     )
// );
// # User: Log in
// Route::post('/login',
//     array(
//         'before' => ['csrf','guest'],
//         function() {
//             $credentials = Input::only('email', 'password');
//             if (Auth::attempt($credentials, $remember = true)) {
//                 return Redirect::intended('/')
//                     ->with('flash_message', 'Welcome Back!');
//             }
//             else {
//                 return Redirect::to('/login')
//                     ->with('flash_message', 'Log in failed; please try again.');
//             }
//             return Redirect::to('login');
//         }
//     )
// );
// # User: Logout
// Route::get('/logout', function() {
//     # Log out
//     Auth::logout();
//     # Send them to the homepage
//     return Redirect::to('/');
// });


/*-------------------------------------------------------------------------------------------------
tested examples below
-------------------------------------------------------------------------------------------------*/








Route::get('/practice-reading', function() {

    # The all() method will fetch all the rows from a Model/table
    $tasks = Task::all();

    # Make sure we have results before trying to print them...
    if($tasks->isEmpty() != TRUE) {

        # Typically we'd pass $books to a View, but for quick and dirty demonstration, let's just output here...
        foreach($tasks as $task) {
            echo 'task id: '.$task->id.'<br><br>'.'created at: '.$task->created_at.'<br>'.'task name: '.$task->name.'<br>'.'task complete?: '.$task->complete.'<br><br><br>';
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









