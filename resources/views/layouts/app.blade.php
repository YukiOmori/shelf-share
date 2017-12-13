<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Original CSS-->
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css" />
    
    <!--favicon-->
    <link rel="shortcut icon" href="{{ asset('images/favicon/favicon.ico') }}"  type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('images/favicon/apple-touch-icon.png')}}" />
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/7c88af45de.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <!--{{ config('app.name', 'Laravel') }}-->
                        <img src="{{asset('images/favicon/apple-touch-icon-180x180.png')}}"></img>Shelf Share
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="{{url('usersedit/'.Auth::user()->id)}}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('usersedit-form').submit();">
                                            Setting
                                        </a>

                                        <form id="usersedit-form" action="{{url('usersedit/'.Auth::user()->id)}}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <div id="wrapper">
            @guest
            @else
            <aside id="sidebar">
                <ul>
                    <li><a href="{{url('/home')}}"><i class="fa fa-home" aria-hidden="true"></i>HOME</a></li>
                    <li><a href="{{url('/')}}"><i class="fa fa-search" aria-hidden="true"></i>蔵書検索</a></li>
                    <li><a href="{{url('/books/register')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i>書籍登録</a></li>
                    <li><a href="{{url('/books/lend')}}"><i class="fa fa-book" aria-hidden="true"></i><i class="fa fa-arrow-right" aria-hidden="true"></i>貸出書籍</a></li>
                    <li><a href="{{url('/books/borrow')}}"><i class="fa fa-book" aria-hidden="true"></i><i class="fa fa-arrow-left" aria-hidden="true"></i>借入書籍</a></li>
                    <li><a href="{{url('/books/favorite')}}"><i class="fa fa-star" aria-hidden="true"></i>お気に入り</a></li>
                </ul>
            </aside>
            @endguest
            <main id="main">
                @yield('content')
            </main>
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
