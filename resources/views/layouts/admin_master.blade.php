<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="このサイトは、日々奮闘する下っ端プログラマのOdaがオールジャンルの情報を提供し、運営するサイトです。">
  <meta name="author" content="ODA">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>{{ Config::get('word.title') }}</title>

  <!-- Compiled and minified CSS -->X
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.3.0/styles/default.min.css">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- Fonts from Google Fonts -->
  @include('elements.fonts')

  <!-- Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>
<body class="blue-grey lighten-5">
  <header>
    <nav class="teal">
      <div class="nav-wrapper">
        <div class="container">
          <div class="brand-logo">{{ $logo }}</div>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="{{ url('blog') }}">BLOG</a></li>
            <li><a href="{{ url('payment') }}">PAYMENT</a></li>
            <!-- <li><a href="{{ url('blog/create') }}"><i class="material-icons left">create</i>記事作成</a></li> -->
            <!-- <li><a href="{{ url('auth/register') }}">ユーザ登録</a></li> -->
            <li><a href="{{ url('logout') }}"><i class="material-icons left">exit_to_app</i>LOGOUT</a></li>
          </ul>
        </div>
      </div>
      <!-- @yield('sidebar') -->
    </nav>
  </header>
  <main>
    <div class="container">
      @yield('content')

      @yield('action_button')
    </div>
  </main>

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.19/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/highlight.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.5/marked.min.js"></script>

  <!-- Custome script for this template -->
  <script src="{{ asset('js/materialize.min.js') }}"></script>
  <script src="{{ asset('js/boot_materialize.js') }}"></script>
  <script src="{{ asset('js/boot_marked.js') }}"></script>
  <script src="{{ asset('js/submit.js') }}"></script>
</body>
</html>