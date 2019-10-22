<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('forum') }}">
                    Discussion Forum
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side of navbar
                    -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class = "container">
                @if($errors->count()>0)
                <ul class = "list-group">
                    @foreach($errors->all() as $error)
                        <li class = "list-group-item">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class = "container ">
            <div class = "row">
            <div class = "col-md-4">
                @if ($message = Session::get('success'))

                    <div class="alert alert-success alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>

                    @if ($message = Session::get('warning'))

                        <div class="alert alert-warning alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>

                    @endif

                @endif
                <a href = "{{route('discussion.create')}}" class = "btn btn-success btn-block">Create a new Discussion</a>

                    <div class = "card mt-2">
                        <div class = "card-header">Home</div>
                        <li class = "list-group"><a  href = "{{route('forum.my')}}" class = "list-group-item">My Discussion</a>
                        <li class = "list-group"><a  href = "#" class = "list-group-item">Answer Question</a>
                        <li class = "list-group"> <a href = "#" class = "list-group-item">Unanswered Question</a> </li>
                        </li>
                    </div>

                <div class = 'card mt-4'>
                    <div class = 'card-header'>Chanel</div>
                    <div class = "card-body">
                        <div class = "list-group">
                        <div class = "list-group">
                            <ul class = "list-group">
                                @foreach($channels as $channel)
                                    <a href = {{route('channel',['slug'=>$channel->slug])}} style="text-decoration:none;"> <li class = "list-group-item">{{$channel->name}}</li> </a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class = "col-md-8">
                @yield('content')

            </div>
            </div>
        </div>

    </div>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('success'))
            toastr.success('{{Session::get('success')}}')
        @endif
    </script>

</body>
</html>
