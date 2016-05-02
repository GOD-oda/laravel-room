<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="{{ Config::get('word.meta.discription') }}">
  <meta name="author" content="ODA">
  <link rel="shortcut icon" href="assets/img/favicon.png">

  <title>{{ Config::get('word.title') }}</title>

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- Fonts from Google Fonts -->
  @include('elements.fonts')

  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>

<body class="blue-grey lighten-5">
<header>

</header>

<main>
  <div class="parallax-container" style="height: auto;">
    <div class="container">
      <br>
      <br>
      <h1 class="center grey-text text-lighten-1">
        What's Laravel?
      </h1>
      <div class="row center">
        <h2 class="header col s12 light top-discription">
          Welcome to Laravel World!
        </h2>
      </div>
    </div>
    <div class="parallax">
      <img src="{{ asset('img/01.jpg') }}" alt="">
    </div>
  </div>

  @yield('content')
</main>

@include('layouts.footer')

  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{ asset('js/materialize.min.js') }}"></script>
  <script src="{{ asset('js/boot_materialize.js') }}"></script>
</body>
</html>