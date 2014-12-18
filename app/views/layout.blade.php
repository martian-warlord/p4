<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <link href="http://netdna.bootstrapcdn.com/bootswatch/3.1.1/readable/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header><div class="container">
    <nav>
        <ul>
        @if(Auth::check())
            <li><a href='/logout'>Log out {{ Auth::user()->email; }}</a></li>
            <li><a href='/incomplete'>Active Tasks</a></li>
            <li><a href='/create'>+ Add Tasks</a></li>
            <li><a href='/completed'>Task Archive</a></li>
            <li><a href='/all'>All Tasks</a></li>
        @else
            <li><a href='/signup'>Sign up</a> or <a href='/login'>Log in</a></li>
        @endif
        </ul>
    </nav></div >
            <div class="jumbotron">
              <div class="container">
<a href="/" ><h1>TASK BLASTER<h1></a>
<!-- <p><small><a href="/" >Incoming</a> / <href="/completed" >Outgoing</a> / <href="/all" >Full Horizon</a> </small></p> -->
              </div>
            </div>
    <div class="alert alert-block">
        @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif
</div>
</header>

@yield('content')


</body>
</html>