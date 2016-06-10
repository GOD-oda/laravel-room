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
      <!--
      <div class="col l4 offset-12 s12">
        <h5 class="white-text">
          Links
        </h5>
        <ul>
          <li><a href="{{ url('login') }}" class="grey-text text-lighten-3">LOGIN</a></li>
        </ul>
      </div>
      -->
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      {{ Config::get('laravel-room.copyright') }}
    </div>
  </div>
</footer>