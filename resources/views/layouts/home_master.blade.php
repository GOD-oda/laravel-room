<!DOCTYPE html>
<html lang="ja">
<head>
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({
      google_ad_client: "ca-pub-2104974064660236",
      enable_page_level_ads: true
    });
  </script>

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

  @include('elements.header')

  <main>

    @yield('content')

    @include('elements.action_button')

  </main>

  @include('layouts.footer')

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
  <script src="{{ asset('js/boot_materialize.js') }}"></script>
  <script src="{{ asset('js/article.js') }}"></script>

  @include('articles.elements.sns')


  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script language="JavaScript">
    $(document).ready( function () {
       $("a[href^='http']:not([href*='" + location.hostname + "'])").attr('target', '_blank');
    })
  </script>
</body>
</html>
