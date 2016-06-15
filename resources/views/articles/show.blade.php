@extends('layouts.home_master')

@section('content')
<div class="container">
  <div class="section">
    <div class="article-show">
      <h1>{{ $article->title }}</h1>
      <div class="divider"></div>
      <div class="row">
        <div class="col s12">
          <div class="right mt5">
            <i class="material-icons">build</i> {{ date('Y.m.d', strtotime($article->created_at)) }}
            <i class="material-icons">autorenew</i> {{ date('Y.m.d', strtotime($article->updated_at)) }}
          </div>
        </div>
      </div>
      {!! $article->body !!}
    </div>
  </div>
  <div class="divider"></div>
  <div class="section">
    <a class="twitter-share-button" href="https://twitter.com/share" data-dnt="true">Tweet</a>
    <div class="fb-like" data-href="{{ url($article->uri) }}" data-layout="button_count" data-action="like" data-show-faces="true"></div>
    <a href="http://b.hatena.ne.jp/entry/{{ url($article->uri) }}" class="hatena-bookmark-button" data-hatena-bookmark-title="laravel-room" data-hatena-bookmark-layout="standard-balloon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
    <script>
      window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
    </script>
    <div id="fb-root"></div>
    <script>
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async">
      {lang: "ja"}
    </script>
  </div>
</div>
@stop