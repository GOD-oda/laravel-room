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
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">

  <!-- Fonts from Google Fonts -->
  @include('elements.fonts')

  <!--Import Google Icon Font-->
  <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

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
    @include('elements.parallax')

    {{--
    <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper">
              <ul id="nav-mobile" class="center hide-on-med-and-down">
                <li>
                  <a href="{{ url('/') }}" class="waves-effect waves-light btn btn-ghost">TOP</a>
                </li>
                <li>
                  <a href="{{ route('beginner') }}" class="waves-effect waves-light btn btn-ghost">中級者向けチュートリアル</a>
                </li>
                <li>
                  <a href="{{ route('intermediate') }}" class="waves-effect waves-light btn btn-ghost">中級者向けチュートリアル</a>
                </li>
                <li>
                  <a href="{{ action('ContactController@index') }}" class="waves-effect waves-light btn btn-ghost">お問い合わせ</a>
                </li>
              </ul>
          <ul id="slide-out" class="side-nav">
            <li>
              <div class="userView">
                <img src="{{ asset('img/profile-background2.jpeg') }}" alt="" class="background">
                <a href="#"><img src="{{ asset('img/profile-background.jpeg') }}" alt="" class="circle"></a>
                <a href="#"><span class="blue-grey-text text-lighten-5 name">t-oda</span></a>
                <a href="#"><span class="blue-grey-text text-lighten-5 email">takahiro.tech.oda@gmail.com</span></a>
                <ul class="sns-logo">
                  <li><a href="https://twitter.com/Tkahiro_Oda" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                  <!-- <li><a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a></li> -->
                  <!-- <li><a href="#" target="_blank"><i class="fa fa-github"></i></a></li> -->
              </ul>
            </li>
            <li>
              <a href="{{ url('/') }}" class="black-text"><i class="material-icons left">home</i>TOP</a>
            </li>
            <li>
              <a href="{{ action('ContactController@index') }}" class="black-text"><i class="material-icons left">info_inline</i>お問い合わせ</a>
            </li>
          </ul>
          <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only white-text"><i class="material-icons">view_headline</i></a>
        </div>
        </div>
      </nav>
    </div>
    --}}
  </header>

  <main>

    @yield('content')

    @include('articles.elements.action_button')
  </main>

  @include('layouts.footer')

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
  <script src="{{ asset('js/boot_materialize.js') }}"></script>
  <script src="{{ asset('js/article.js') }}"></script>

  @include('articles.elements.sns')

</body>
</html>