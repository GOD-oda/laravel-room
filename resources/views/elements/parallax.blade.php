<div class="parallax-container" style="height: auto;">
  <div class="container">
    <h1 class="center">
      <a href="{{ url('/') }}" class="grey-text text-lighten-1">{{ Config::get('laravel-room.parallax.title') }}</a>
    </h1>
    <nav>
      <div class="nav-wrapper">
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li>
            <a href="{{ url('/') }}" class="waves-effect waves-light btn btn-ghost">TOP</a>
          </li>
          <li>
            <a href="{{ action('ContactController@index') }}" class="waves-effect waves-light btn btn-ghost">お問い合わせ</a>
          </li>
        </ul>
        <ul id="slide-out" class="side-nav teal lighten-3">
          <li>
            <a href="{{ url('/') }}">TOP</a>
          </li>
          <li>
            <a href="{{ action('ContactController@index') }}">お問い合わせ</a>
          </li>
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      </div>
    </nav>
  </div>
  <div class="parallax">
    <img src="{{ asset('img/parallax-min.jpg') }}" alt="parallax">
  </div>
</div>