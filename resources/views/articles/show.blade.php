@extends('layouts.home_master')

@section('content')
<article>
  <div class="article-show card">
    <div class="container">
      <section class="section">
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
        <div class="article-body">
          {!! $article->body !!}
        </div>
      </section>
    </div>
  </div>

  <div class="ads-area container">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- laravel-room -->
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-2104974064660236"
           data-ad-slot="6147411704"
           data-ad-format="auto"></ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
  </div>



</article>
@stop