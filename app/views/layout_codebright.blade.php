<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <link href="http://netdna.bootstrapcdn.com/bootswatch/3.1.1/readable/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" /> -->
</head>
<body>

<header>
            <div class="jumbotron">
              <div class="container">

<!--                         <a href='/'>
                        <h1>
                            Task Manager
                        </h1>
                        </a> -->
<!--                                 <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header"> -->
<a href="{{ action('TasksController@index') }}" ><h1>Task Manager<h1></a>
<!--             </div>
        </nav> -->

              </div>
            </div>
</header>


    @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif

<div class="jumbotron">
    <div class="container">


<!--         <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a href="{{ action('TasksController@index') }}" class="navbar-brand">Task Manager</a>
            </div>
        </nav> -->


        @yield('content')
    </div>
    </div>
</body>
</html>