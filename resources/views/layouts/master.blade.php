<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    @include ('layouts.nav')

    <!-- Page Content -->
    <br>
    <br>
    <div class="container">
    @yield('content')
    </div>

  
  

    @include ('layouts.footer')

  </body>

</html>
