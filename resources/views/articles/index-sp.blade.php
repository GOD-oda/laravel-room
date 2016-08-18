@extends('layouts.home_master')

@section('content')
<div class="container" id="top-main-content">
  {!! $articles->render() !!}
  @foreach ($articles as $key => $article)
    <div class="row">
      <div class="col s12 m6 l6">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator img-cover" src="{{ isset($article->image_path) ? asset('img/thumbnail/'.$article->image_path) : asset('img/laravel5.jpg') }}">
          </div>
          <div class="card-content">
            <h2 class="card-title activator grey-text text-darken-4">{{ $article->title }}<i class="material-icons right">more_vert</i></h2>
            <p><a href="{{ action('ArticlesController@show', ['uri' => $article->uri]) }}">詳細はこちら</a></p>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">{{ $article->title }}<i class="material-icons right">close</i></span>
            <p>{!! nl2br($article->discription) !!}</p>
            <p><a href="{{ action('ArticlesController@show', ['uri' => $article->uri]) }}">詳細はこちら</a></p>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  {!! $articles->render() !!}
</div><!-- /.container -->
@endsection