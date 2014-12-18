<?php

Route::get('/classes', function() {
    echo Paste\Pre::render(get_declared_classes(),'');
});


Route::get('/', function() {
    return View::make('index');
});

/*-------------------------------------------------------------------------------------------------
User routes
-------------------------------------------------------------------------------------------------*/



Route::get('/signup',
    array(
    'before' => 'guest',
    function() {
    return View::make('signup');
    }
    )
);

Route::post('/signup', function(){
    $data = Input::all();

    // Validation constraints.
    $rules = array(
    'email' => 'required|email|unique:users,email',
    'password' => 'required|min:6'
    );

    // Validator instance.
    $validator = Validator::make($data, $rules);

    // If fails
    if ($validator->fails()) {
    return Redirect::to('/signup')                 
    ->with('flash_message', 'Sign up failed; please fix the errors listed below.')
    ->withInput()
    ->withErrors($validator);
    }

    // SUCCESS
    $user = new User;
    $user->email    = Input::get('email');
    $user->password = Hash::make(Input::get('password'));

    # Try to add the user
    try {
        $user->save();
        }
    # Fail
    catch (Exception $e) {
    return Redirect::to('/signup')
    ->with('flash_message', 'Sign up failed; please try again.')->withInput();
                        }

    # Login
    Auth::login($user);
    return Redirect::to('/all')
    ->with('flash_message', 'Welcome!');
});





# Log in get
Route::get('/login',
    array(
    'before' => 'guest',
    function() {
    return View::make('login');
                }
));



# Log in post
Route::post('/login',
    array(
    'before' => ['csrf','guest'],   
    function() {
    $credentials = Input::only('email', 'password');
    if (Auth::attempt($credentials, $remember = true)) {
        return Redirect::intended('/')
            ->with('flash_message', 'Welcome Back!');
    }
    else {
        return Redirect::to('/login')
            ->with('flash_message', 'Log in failed; please try again.');
    }
    return Redirect::to('login');
    }
));


# Logout
Route::get('/logout', function() {
    # Log out
    Auth::logout();
    # Send them to the homepage
    return Redirect::to('/');
});






/*-------------------------------------------------------------------------------------------------
Task routes
-------------------------------------------------------------------------------------------------*/





// route for completed tasks
Route::get('/completed', array(
    'before' => 'auth.basic',
    function() {
    $tasks = Task::all();
    return View::make('completed')-> with('tasks', $tasks);  
                }
));

//route for incomplete tasks
Route::get('/incomplete', array(
    'before' => 'auth.basic',
    function() {
    $tasks = Task::all();
    return View::make('incomplete')-> with('tasks', $tasks);  
                }
));

//route for all tasks
Route::get('/all', array(
    'before' => 'auth.basic',
    function() {
    $tasks = Task::all();
    return View::make('/all')-> with('tasks', $tasks);   
                }
));

Route::get('/create', array(
    'before' => 'auth.basic',
    function() {  
    return View::make('/create');   
                }
));





Route::post('/handleCreate', function() {

   $data = Input::all();

    //Validation constraints.
    $rules = array(
    'name' => array('min:1')
    );
    //New validator
    $validator = Validator::make($data, $rules);

    //If fails
    if ($validator->fails()) {
    return Redirect::to('/create')
    ->with('flash_message', 'Edit failed. Tasks must be indexed by complete name.')
    ->withInput();
    }


    // SUCCESS
    $task = new Task();
    $task->name        = Input::get('name');
    $task->complete     = Input::has('complete');
    if (Input::has('complete')){
    $task->completed_at_time = new Carbon('America/Chicago');
    };
    $task->save();
    return Redirect::to('/incomplete');
});


Route::get('/edit/{id}', array(
    'before' => 'auth.basic',
    function($id) {
    $task    = Task::findOrFail($id);
    return View::make('edit')->with('task', $task);
                    }
));

Route::post('/handleEdit', function() {
    $data = Input::all();
    //Validation constraints
    $rules = array(
        'name' => array('min:1')
    );

    // Validator instance.
    $validator = Validator::make($data, $rules);

    // Fails conditional
    if ($validator->fails()) {
    return Redirect::to('/incomplete')
    ->with('flash_message', 'Edit failed. Tasks must be indexed by complete name.');
    }

    // SUCCESS!
    $task = Task::findOrFail(Input::get('id'));
    $task->fill(Input::all());
    $task->complete     = Input::has('complete');
    if (Input::has('complete')){
    $task->completed_at_time = new Carbon('America/Chicago');
    };
    $task->save();
    return Redirect::to('/all');
});




/*-------------------------------------------------------------------------------------------------
Misc
-------------------------------------------------------------------------------------------------*/

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

# /app/routes.php
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});








