<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Blog</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Toastr js for notifications --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">
    {{-- FontAwesome --}}
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>

    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    My Blog
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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

        <main class="py-4">

            <div class="container">
                <div class="row">
                    @if(Auth::check())
                        <div class="col-lg-4">
                        {{-- NAVIGATION --}}
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="list-group-item">
                                  <a href="{{ route('user.profile') }}">My Profile</a>
                                </li>
                                @if(Auth::user()->admin)
                                  <li class="list-group-item">
                                    <a href="{{ route('users') }}">List Users</a>
                                  </li>
                                  <li class="list-group-item">
                                    <a href="{{ route('user.create') }}">Create new user</a>
                                  </li>
                                @endif
                                <li class="list-group-item">
                                    <a href="{{ route('categories') }}">List Categories</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('tags') }}">List Tags</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('posts') }}">List Posts</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('posts.trashed') }}">List Trashed Posts</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('post.create') }}">Create new post</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('category.create') }}">Create new category</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('tag.create') }}">Create new tag</a>
                                </li>
                            </ul>
                        </div>
                    @endif

                    <div class="col-lg-8">
                        @yield('content')
                    </div>
                </div>
            </div>


        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- Toastr js for notifications --}}
    <script type="text/javascript" src="{{ asset('js/toastr.min.js') }}"></script>

    {{-- Success Notification using Toastr js --}}
    <script type="text/javascript">
        @if(Session::has('success'))
            toastr.options = {
                              "closeButton": true,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": false,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "5000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            }
            toastr.success("{{ Session::get('success') }}");

        @elseif (Session::has('info')) 
        {
                toastr.options = {
                              "closeButton": true,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": false,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "5000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            }
            toastr.info("{{ Session::get('info') }}");
        }

        @endif
    </script>
    @yield('scripts')
</body>
</html>
