<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>payment</title>
</head>
<body>
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
            <li><a href="{{ url('logout') }}"><i class="material-icons left">exit_to_app</i>ログアウト</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <ul id="slide-out" class="side-nav fixed">
      <li><a href="#!">First Sidebar Link</a></li>
      <li><a href="#!">Second Sidebar Link</a></li>
    </ul>
    <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
  </header>
  <main>
    <div class="container">
      @yield('content')
    </div>
  </main>
</body>
</html>