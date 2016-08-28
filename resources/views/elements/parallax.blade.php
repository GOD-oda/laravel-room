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
      </div>
    </nav>
    <ul id="slide-out" class="side-nav">
      <li>
        <div class="userView">
          <img src="{{ asset('img/profile-background2.jpg') }}" alt="" class="background">
          <a href="#"><img src="{{ asset('img/profile-background.jpg') }}" alt="" class="circle"></a>
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