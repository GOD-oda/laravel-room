@extends('layouts.home_master')

@section('twitter-tags')
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@Tkahiro_Oda" />
<meta name="twitter:creator" content="@Tkahiro_Oda" />
<meta name="twitter:domain" content="laravel-room.com" />
<meta name="twitter:title" content="{{ $article->title }}" />
<meta name="twitter:description" content="{{ $article->discription }}" />
<meta name="twitter:image" content="{{ is_null($article->image_path) ? '' : secure_asset('img/thumbnail/'.$article->image_path) }}" />
@endsection

@section('facebook-tags')
<meta property="og:url" content="//laravel-room.com/{{ $article->uri }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $article->title }}" />
<meta property="og:description" content="{{ $article->discription }}" />
<meta property="og:image" content="{{ is_null($article->image_path) ? '' : secure_asset('img/thumbnail/'.$article->image_path) }}" />
@endsection

@section('content')
<article>
  <div class="container">
    <div class="post-image">
      <img src="{{ secure_asset('img/thumbnail/'.$article->image_path) }}" alt="">
    </div>
    <section class="article-box card">
      <div class="row">
        <div class="col s12 m10">
          <h1>{{ $article->title }}</h1>
          <div class="divider"></div>

          <div class="posted-at">
            <i class="material-icons">build</i> {{ date('Y.m.d', strtotime($article->created_at)) }}
            <i class="material-icons">autorenew</i> {{ date('Y.m.d', strtotime($article->updated_at)) }}
          </div>

          <div class="article-body">
            {!! $article->body !!}
          </div>
        </div>
        <div class="col m1 offset-m1 hide-on-small-only sns-area center-align">
          <div class="sns-label">share</div>
          <a href="https://twitter.com/share" class="sns-btn" data-url="{{ $article->uri }}" data-via="Tkahiro_Oda">
            <img src="{{ secure_asset('img/sns/twitter.svg') }}" alt="ツイッターアイコン" class="sns-icon">
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=http://laravel-room.com/{{ $article->uri }}" target="_blank" rel="nofollow">
            <img src="{{ secure_asset('img/sns/facebook.svg') }}" alt="" class="sns-icon">
          </a>
          <div class="sns-hatena">
            <a href="http://b.hatena.ne.jp/entry/s/laravel-room.com/{{ $article->uri }}" class="hatena-bookmark-button" data-hatena-bookmark-layout="touch-counter" data-hatena-bookmark-title="{{ $article->title }}" data-hatena-bookmark-width="50" data-hatena-bookmark-height="50" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
          </div>
        </div>
      </div>



      <div class="divider"></div>

      @include('articles.elements.adsense')
    </section>


  </div>
  <!-- <div class="article-show card">
    <div class="container">
      <section class="section">
        <h1>{{ $article->title }}</h1>
        <div class="divider"></div>
        <div class="row">
          <div class="col s12 m10">
            <div class="right mt5">
              <i class="material-icons">build</i> {{ date('Y.m.d', strtotime($article->created_at)) }}
              <i class="material-icons">autorenew</i> {{ date('Y.m.d', strtotime($article->updated_at)) }}
            </div>
          </div>
        </div>
        <div class="article-body">
          {!! $article->body !!}
        </div>
      </section> -->


    </div>
  </div>



</article>
@stop