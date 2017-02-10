@extends('layouts.home_master')

@section('content')
<div class="top-main-content">

  @if (Request::is('/'))
    {!! $articles->render() !!}
  @endif
  <div class="row">
    <div class="col s8">
      @foreach ($articles as $key => $article)
        <div class="row">
          <div class="col s12">
            <div class="card horizontal">
              <div class="card-image">
                <a href="{{ action('ArticlesController@show', ['uri' => $article->uri]) }}">
                  <img class="img-cover" src="{{ isset($article->image_path) ? asset('img/thumbnail/'.$article->image_path) : asset('img/laravel5.jpg') }}">
                </a>
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <a href="{{ action('ArticlesController@show', ['uri' => $article->uri]) }}">
                    <h2 class="card-title left-align">{{ $article->title }}</h2>
                  </a>
                  <p>{!! nl2br($article->discription) !!}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="col s4">
      <div class="card tag-box">
        <div class="tag-title-area">
          <span class="tag-title">タグ</span>
        </div>
        <div class="tag-list-area">
          @foreach ($tag_name_list as $tag_name)
            <a href="{{ url('tag/'.$tag_name) }}">
              <div class="chip">
                <span>{{ $tag_name }}</span>
              </div>
            </a>
          @endforeach
        </div>
      </div>
      <div class="ads-rectangle-area card">
        <div class="ads-rectangle">
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <!-- トップページタグ下 -->
          <ins class="adsbygoogle"
               style="display:inline-block;width:300px;height:250px"
               data-ad-client="ca-pub-2104974064660236"
               data-ad-slot="1045680107"></ins>
          <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
        </div>
      </div>
    </div>
  </div>
  @if (Request::is('/'))
    {!! $articles->render() !!}
  @endif

</div><!-- /.container -->
@endsection
