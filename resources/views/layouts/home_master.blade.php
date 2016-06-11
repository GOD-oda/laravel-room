<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="{{ Config::get('laravel-room.meta.discription') }}">
  <meta name="author" content="{{ Config::get('laravel-room.meta.author') }}">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>{{ Config::get('laravel-room.title') }}</title>

  <link rel="shortcut icon" href="{{ asset('img/laravel.ico') }}" />

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- Fonts from Google Fonts -->
  @include('elements.fonts')

  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->

  <!-- Google Analytics Tracking Code -->
  <script src="{{ asset('js/trackingcode.js') }}"></script>
</head>
<body class="blue-grey lighten-5">
  <header>
  </header>

  <main>
    @include('elements.parallax')

    @yield('content')
  </main>

  @include('layouts.footer')

  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{ asset('js/materialize.min.js') }}"></script>
  <script src="{{ asset('js/boot_materialize.js') }}"></script>
  <script src="{{ asset('js/article.js') }}"></script>
</body>
</html>