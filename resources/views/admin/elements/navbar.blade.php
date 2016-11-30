<nav class="teal">
  <div class="nav-wrapper">
    <div class="container">
      <div class="brand-logo">{{ $logo }}</div>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="{{ route('blog.index') }}">BLOG</a></li>
        <li><a href="{{ route('payment.index') }}">PAYMENT</a></li>
        <!-- <li><a href="{{ url('blog/create') }}"><i class="material-icons left">create</i>記事作成</a></li> -->
        <!-- <li><a href="{{ url('auth/register') }}">ユーザ登録</a></li> -->
        <li><a href="{{ route('logout') }}"><i class="material-icons left">exit_to_app</i>LOGOUT</a></li>
      </ul>
    </div>
  </div>
  <!-- @yield('sidebar') -->
</nav>
