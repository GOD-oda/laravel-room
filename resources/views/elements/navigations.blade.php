<!-- top navigation on PC -->
<nav>
  <div class="nav-wrapper">
    <!-- <ul id="nav-mobile" class="right hide-on-med-and-down"> -->
    <ul id="nav-mobile" class="center hide-on-med-and-down">
      <!-- Dropdown Trigger -->
      <li>
        <a href="{{ url('/') }}" class="waves-effect waves-light btn btn-ghost">TOP</a>
      </li>
      <li>
        <a href="#" class="dropdown-button btn btn-ghost" data-activates="tutorial">チュートリアル<i class="material-icons right">arrow_drop_down</i></a>
        <!-- Dropdown Structure -->
        <ul id="tutorial" class="dropdown-content">
          <li><a href="#!">初心者向け</a></li>
          <li><a href="#!">週休者向け</a></li>
        </ul>
      </li>
      <li>
        <a href="{{ action('ContactController@index') }}" class="waves-effect waves-light btn btn-ghost">お問い合わせ</a>
      </li>
    </ul>
  </div>
</nav>