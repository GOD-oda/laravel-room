
<header>
  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper teal">
        <div class="container">
          <a href="#" data-activates="slide-out" class="button-collapse hamburger-button"><i class="material-icons">menu</i></a>
          <a href="{{ url('/') }}" class="brand-logo">{{ Config::get('laravel-room.title') }}</a>
        </div>
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
</header>
<!-- side navigation -->
<ul id="slide-out" class="side-nav">
  <li>
    <a href="{{ route('top') }}" class="black-text waves-effect waves-teal waves-light waves-ripple">
      <i class="material-icons left">home</i>TOP
    </a>
  </li>
  {{--
  <div class="divider"></div>
  <li>
    <a href="{{ route('beginner') }}" class="black-text waves-effect waves-teal waves-light">
      <i class="material-icons left">folder</i>初心者向けチュートリアル
    </a>
  </li>
  <div class="divider"></div>
  <li>
    <a href="{{ route('intermediate') }}" class="black-text waves-effect waves-teal waves-light">
      <i class="material-icons left">folder</i>中級者向けチュートリアル
    </a>
  </li>
  --}}
  <div class="divider"></div>
  <li>
    <a href="{{ route('contact') }}" class="black-text waves-effect waves-teal waves-light waves-ripple">
      <i class="material-icons left">info_inline</i>お問い合わせ
    </a>
  </li>
</ul>
