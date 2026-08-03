<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="/css/font-awesome.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/sass/custom.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" style="color: #636b6f" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}<!-- » {{ request()->route()->getActionMethod(); }}-->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                                </li>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Income
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ url('/income/create') }}">Add new income</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/income') }}">View total income</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ url('/source') }}">View or Add sources</a></li>
                                </ul>
                                </li>
                </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- TODO Refactor into a proper function -->
        @if (session('error'))
            <div class="alert alert-error">
                <button type="button" class="close" style="border: none;" data-bs-dismiss="alert" role="alert">&times;</button>
                {!! session('error') !!}
            </div>
        @endif
    @if (session('success'))
    <div id="alert-nav" class="alert alert-success">
        <button type="button" class="close" style="border: none;" data-bs-dismiss="alert" role="alert">&times;</button>
        {!! session('success') !!} 
        @if (session('result'))
            Date: {{ session('result')['month'] }}/{{ session('result')['year'] }}
            @if ( isset(session('result')['ammountOld']) && session('result')['ammountOld'] !== session('result')['ammount'])
            Amount changed: {{ session('result')['ammountOld'] }} » {{ session('result')['ammount'] }}
            @else
            Amount: {{ session('result')['ammount'] }}
            @endif
        @endif
    </div>
    <!-- <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button> -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
        <div class="toast-header">
        <!-- <img src="..." class="rounded me-2" alt="..."> -->
        <i class="fa fa-exclamation-circle"></i>&nbsp;
        <strong class="me-auto">Success</strong>
        <small>Notification</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
        <div class="alert alert-success">
         {!! session('success') !!}</div>
        </div>
    </div>
    </div>
    @endif
    <!-- Modal for delete confirmation -->
    <div class="modal" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="confirmModalLabel">Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id='modal-body-text' class="modal-body">
            Do you want to continue DELETE record ID: <span id='modal-body-id'></span> ?
        </div>
        {{ Form::open([ 'id' => 'deleteItemForm', 'method'  => 'delete', 'route' => [ 'income.destroy', 0 ]]) }}
        {{ Form::hidden('id', 0) }}
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
        </div>
        {{ Form::close() }}
    </div>
    </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
