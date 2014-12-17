<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <link href="http://netdna.bootstrapcdn.com/bootswatch/3.1.1/readable/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" /> -->
</head>
<body>
        @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif

<header>

    @if(Auth::check())
    <a href='/logout'>Log out {{ Auth::user()->email; }}</a>
@else 
    <a href='/signup'>Sign up</a> or <a href='/login'>Log in</a>
@endif


            <div class="jumbotron">
              <div class="container">

<!--                         <a href='/'>
                        <h1>
                            Task Manager
                        </h1>
                        </a> -->
<!--                                 <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header"> -->
<a href="/" ><h1>Task Manager<h1></a>
<!--             </div>
        </nav> -->

              </div>
            </div>
</header>



<div class="jumbotron">
    <div class="container">




        @yield('content')
    </div>
    </div>
</body>
</html>