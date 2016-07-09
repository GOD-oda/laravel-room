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
          Profile
        </h5>
        <p class="grey-text text-lighten-4">
          {{ Config::get('laravel-room.profile') }}
        </p>
        <!-- ポートフォリオ作った時にこれを開放する
        <div class="chip">
          <a href="#" class="grey-text text-darken-4">
            <img src="{{ asset('img/laravel5.jpg') }}" alt="author">
            t-oda
          </a>
        </div>
        -->
      </div>
    </div>
    <!-- sns button -->
    <div class="row">
      <a href="https://twitter.com/share" class="twitter-share-button" data-via="Tkahiro_Oda">
        Tweet
      </a>
      <div class="fb-like" data-href="http://laravel-room.com/" data-width="20px" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true">
      </div>
      <a href="http://b.hatena.ne.jp/entry/laravel-room.com" class="hatena-bookmark-button" data-hatena-bookmark-title="Laravel Room" data-hatena-bookmark-layout="standard-balloon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加">
        <img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" />
      </a>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      {{ Config::get('laravel-room.copyright') }}
    </div>
  </div>
</footer>