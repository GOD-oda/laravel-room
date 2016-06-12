<div class="navbar-fixed">
  <nav class="teal">
    <ul class="right hide-on-med-and-down">
      <li>
        <a href="{{ action('ContactController@index') }}" class="waves-effect waves-light btn btn-ghost">お問い合わせ</a>
      </li>
    </ul>
    <ul id="slide-out" class="side-nav teal lighten-3">
      <li>
        <!-- <a href="{{ url('/') }}" class="btn btn-ghost">TOP</a> -->
        <a href="#">TOP</a>
      </li>
      <li>
        <!-- <a href="{{ action('ContactController@index') }}" class="btn btn-ghost">お問い合わせ</a> -->
        <a href="#">お問い合わせ</a>
      </li>
    </ul>
    <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
  </nav>
</div>