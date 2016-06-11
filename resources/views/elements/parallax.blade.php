<div class="parallax-container" style="height: auto;">
  <div class="container">
    <h1 class="center">
      <a href="{{ url('/article') }}" class="grey-text text-lighten-1">{{ Config::get('laravel-room.parallax.title') }}</a>
    </h1>
    {{--
    <!-- お問い合わせフォームのリンク -->
    <div class="row">
      <div class="col offset-m8 m4">
        <a href="{{ action('ContactController@index') }}" class="waves-effect waves-light btn btn-ghost">お問い合わせ</a>
      </div>
    </div>
    --}}
    <!-- <div class="row">
      <div class="col s12 m4">
        <a class="waves-effect waves-light btn btn-ghost" href="#" onclick="alert('ポートフォリオ');">ポートフォリオ</a>
      </div>
      <div class="col s12 m4">
        @include('articles.elements.notice')
      </div>
      <div class="col s12 m4">
        @include('articles.elements.notice')
      </div>
    </div> -->
  </div>
  <div class="parallax">
    <img src="{{ asset('img/parallax-min.jpg') }}" alt="parallax">
  </div>
</div>