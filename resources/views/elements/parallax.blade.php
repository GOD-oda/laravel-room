<div class="parallax-container" style="height: auto;">
  <div class="container">
  <!-- <div class="container" style="width: 90%;"> -->
    <h1 class="center">
      <a href="{{ url('/') }}" class="grey-text text-lighten-1">{{ Config::get('laravel-room.parallax.title') }}</a>
    </h1>
    <!-- Dropdown Structure -->
    <!-- <ul id="tutorial" class="dropdown-content">
      <li><a href="#!">初心者向け</a></li>
      <li><a href="#!">週休者向け</a></li>
    </ul> -->
    <!-- <ul id="dropdown1" class="dropdown-content">
      <li><a href="#!">one</a></li>
      <li><a href="#!">two</a></li>
      <li class="divider"></li>
      <li><a href="#!">three</a></li>
    </ul> -->
    <nav>
      <div class="nav-wrapper">
        <ul id="nav-mobile" class="right hide-on-med-and-down">
        <!-- <ul id="nav-mobile" class="center hide-on-med-and-down">
          <li>
            <a href="{{ url('/') }}" class="waves-effect waves-light">TOP</a>
          </li> -->
          <!-- Dropdown Trigger -->
          <li>
            <a href="{{ url('/') }}" class="waves-effect waves-light btn btn-ghost">TOP</a>
            <!-- <a href="#!" class="dropdown-button" data-activates="tutorial">チュートリアル<i class="material-icons right">arrow_drop_down</i></a> -->
          </li>
          <!-- <li>
            <a href="#!" class="dropdown-button" data-activates="dropdown1">チュートリアル<i class="material-icons right">arrow_drop_down</i></a>
          </li> -->
          <!-- <li>
            <a href="{{ route('beginner') }}" class="waves-effect waves-light btn btn-ghost">中級者向けチュートリアル</a>
          </li>
          <li>
            <a href="{{ route('intermediate') }}" class="waves-effect waves-light btn btn-ghost">中級者向けチュートリアル</a>
          </li> -->
          <li>
            <a href="{{ action('ContactController@index') }}" class="waves-effect waves-light btn btn-ghost">お問い合わせ</a>
          </li>
        </ul>
      </div>
    </nav>
    <ul id="slide-out" class="side-nav">
      <li>
        <div class="userView">
          <img src="{{ asset('img/profile-background2.jpeg') }}" alt="" class="background">
          <a href="#"><img src="{{ asset('img/profile-background.jpeg') }}" alt="" class="circle"></a>
          <a href="#"><span class="blue-grey-text text-lighten-5 name">t-oda</span></a>
          <a href="#"><span class="blue-grey-text text-lighten-5 email">takahiro.tech.oda@gmail.com</span></a>
          <ul class="sns-logo">
            <li><a href="https://twitter.com/Tkahiro_Oda" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
            <!-- <li><a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a></li> -->
            <!-- <li><a href="#" target="_blank"><i class="fa fa-github"></i></a></li> -->
        </ul>
      </li>
      <li>
        <a href="{{ url('/') }}" class="black-text"><i class="material-icons left">home</i>TOP</a>
      </li>
      <li>
        <a href="{{ action('ContactController@index') }}" class="black-text"><i class="material-icons left">info_inline</i>お問い合わせ</a>
      </li>
    </ul>
    <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only white-text"><i class="material-icons">view_headline</i></a>
  </div>
  <div class="parallax">
    <img src="{{ asset('img/parallax-min.jpg') }}" alt="parallax">
  </div>
</div>