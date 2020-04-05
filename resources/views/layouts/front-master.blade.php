<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Laravel Blog')</title>
    <style>
        ul>li {
            display: inline-block;
        }
        ul>li a {
            list-style: none;
            text-decoration: none;
        }
        .active {
            background-color: skyblue;
            color: #fff;
            padding: 5px;
        }
        
    </style>
</head>
<body>

    <ul>
        <li><a href="{{ route('welcome') }}" class="{{ request()->is('/') ? 'active' : ''}}">Welcome</a></li>
        <li><a href="{{ route('home') }}" class="{{ request()->is('home') ? 'active' : ''}}">Home</a></li>
        <li><a href="{{ route('about') }}" class="{{ request()->is('this/is/about/page') ? 'active' : ''}}">About</a></li>
    </ul>

    @yield('content')
    
</body>
</html>