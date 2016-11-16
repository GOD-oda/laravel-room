<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper teal">
      <!-- trigger side navigation -->
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">view_headline</i></a>
      <a href="{{ url('/') }}" class="brand-logo">{{ Config::get('laravel-room.title') }}</a>

      <!-- TODO
        検索の処理を追加するまでは出さない。
        Enterで動くようにすること
      <div class="nav-search-wrapper">
        <form>
          <div class="input-field">
          <input type="search" id="search" placeholder="Search...">
          <label for="search"><i class="material-icons">search</i></label><i class="material-icons">close</i>
          </div>
        </form>
      </div>
      -->
    </div>
  </nav>
</div>
<!-- side navigation -->
<ul id="slide-out" class="side-nav">
  <li>
    <div class="userView teal lighten-2">
      <img src="{{ asset('img/profile-background.jpeg') }}" alt="" class="circle">
      <span class="name">t-oda</span>
      <a href="#"><span class="email">takahiro.tech.oda@gmail.com</span></a>
      <a href="https://twitter.com/Tkahiro_Oda" target="_blank"><i class="fa fa-twitter-square"></i></a>
    </div>
  </li>
  <li>
    <a href="{{ url('/') }}" class="black-text waves-effect waves-teal waves-light waves-ripple"><i class="material-icons left">home</i>TOP</a>
  </li>
  <li>
    <a href="{{ action('ContactController@index') }}" class="black-text waves-effect waves-teal waves-light waves-ripple"><i class="material-icons left">info_inline</i>お問い合わせ</a>
  </li>
</ul>