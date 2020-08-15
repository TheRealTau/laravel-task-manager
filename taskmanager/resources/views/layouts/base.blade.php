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
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body>
  <div id="main-container">
    <nav>
      <div class="nav-wrapper grey darken-3">
        
        <ul id="nav-mobile" class="left hide-on-med-and-down">
          {{-- <li><a href="#" class="brand-logo">Home</a></li> --}}
          <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
          <li><a href="{{ route('task.index') }}">Tasks</a></li>
          <li><a href="{{ route('user.index') }}">Users</a></li>
        </ul>

        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <!-- Authentication Links -->
          @guest
            <li>
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
              <li>
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif
          @else
            <li>
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
    </nav>

    <div>
      @yield('content')
    </div>
  </div>

    {{-- MATERIALIZE --}}
    {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    {{-- <script src="{{ asset('js/init.js') }}"></script> --}}

    <script>
      $('select').formSelect();
      $('.datepicker').datepicker({
        autoClose : true,
        format : 'yyyy-mm-dd'});
      $('.timepicker').timepicker();
      $('.collapsible').collapsible();
    </script>
</body>
</html>
