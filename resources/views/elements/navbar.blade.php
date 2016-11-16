<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper teal lighten-1">
      <!-- trigger side navigation -->
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">view_headline</i></a>
      <!-- side navigation -->
      <ul id="slide-out" class="side-nav">
        <li>
          <div class="userView teal lighten-2">
            <img src="{{ asset('img/profile-background.jpeg') }}" alt="" class="circle">
            <span class="blue-grey-text text-lighten-5 name">t-oda</span>
            <a href="#"><span class="blue-grey-text text-lighten-5 email">takahiro.tech.oda@gmail.com</span></a>
            <ul class="sns-logo">
              <li><a href="https://twitter.com/Tkahiro_Oda" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
            </ul>
          </div>
        </li>
        <li>
          <a href="{{ url('/') }}" class="black-text"><i class="material-icons left">home</i>TOP</a>
        </li>
        <li>
          <a href="{{ action('ContactController@index') }}" class="black-text"><i class="material-icons left">info_inline</i>お問い合わせ</a>
        </li>
      </ul>
      <a href="{{ url('/') }}" class="brand-logo">{{ Config::get('laravel-room.parallax.title') }}</a>
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