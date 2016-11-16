<div class="parallax-container" style="height: auto;">
  <div class="container">
<!-- <div class="container" style="width: 90%;"> -->
    <div class="mt10">
      <a href="#" data-activates="slide-out" class="button-collapse white-text"><i class="material-icons">view_headline</i></a>
      <!-- side navigation on mobile-->
      <ul id="slide-out" class="side-nav">
        <li>
          <div class="userView teal">
            <!-- <img src="{{ asset('img/profile-background2.jpeg') }}" alt="" class="background"> -->
            <img src="{{ asset('img/profile-background.jpeg') }}" alt="" class="circle">
            <span class="blue-grey-text text-lighten-5 name">t-oda</span>
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
    </div>
    <h1 class="center">
      <a href="{{ url('/') }}" class="grey-text text-lighten-1">{{ Config::get('laravel-room.parallax.title') }}</a>
    </h1>
  </div>
  <div class="parallax">
    <img src="{{ asset('img/parallax-min.jpg') }}" alt="parallax">
  </div>
</div>