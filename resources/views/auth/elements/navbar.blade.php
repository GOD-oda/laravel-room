<nav class="teal">
  <div class="nav-wrapper">
    <div class="container">
      <span class="brand-logo">{{ $logo }}</span>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <!-- <li><a href="{{ url('blog.t-oda.tech/') }}"><i class="material-icons left">web</i>HOME</a></li> -->
        <li><a href="{{ action('ArticlesController@index') }}"><i class="material-icons left">web</i>HOME</a></li>
      </ul>
    </div>
  </div>
</nav>