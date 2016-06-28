<footer class="page-footer teal">
  <div class="container">
    <div class="row">
      <div class="col l8 s12">
        <h5 class="white-text">
          このサイトについて
        </h5>
        <p class="grey-text text-lighten-4">
          {{ Config::get('laravel-room.content') }}
        </p>
      </div>
      <div class="col l4 offset-12 s12">
        <h5 class="white-text">
          AUTHOR
        </h5>
        <p class="grey-text text-lighten-4">
          {{ Config::get('laravel-room.author') }}
        </p>
          <a href="https://twitter.com/share" class="twitter-share-button" data-via="Tkahiro_Oda" data-size="large">
            Tweet
          </a>
          <div class="fb-like" data-href="http://laravel-room.com/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>

        <!-- <div class="chip">
          <img src="{{ asset('img/laravel5.jpg') }}" alt="">
        </div> -->
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      {{ Config::get('laravel-room.copyright') }}
    </div>
  </div>
</footer>