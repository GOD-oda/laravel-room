@extends('layouts.home_master')

@section('content')
<div class="container top-main-content">

  @if (Request::is('/'))
    {!! $articles->render() !!}
  @endif

  @foreach ($articles as $key => $article)
    <div class="row">
      <div class="col s10 m12">
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

  @if (Request::is('/'))
    {!! $articles->render() !!}
  @endif

</div><!-- /.container -->
@endsection
