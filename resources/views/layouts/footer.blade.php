<footer class="page-footer teal">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">
          このサイトについて
        </h5>
        <p class="grey-text text-lighten-4">
          {{ Config::get('laravel-room.content') }}
        </p>
      </div>
      <!-- <div class="col l4 offset-12 s12">
        <h5 class="white-text">
          author
        </h5>
        <div class="chip">
          <img src="{{ asset('img/laravel5.jpg') }}" alt="">
          Tag
        </div>
      </div> -->
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      {{ Config::get('laravel-room.copyright') }}
    </div>
  </div>
</footer>