@extends('layouts.home_master')

@section('content')
<div class="container">
  <div class="row">
    @foreach ($articles as $key => $article)
      <div class="col s12 m6 hoverable">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator img-cover" src="{{ asset('img/laravel5.jpg') }}">
          </div>
          <div class="card-content">
            <h5 class="card-title activator grey-text text-darken-4">{{ $article->title }}<i class="material-icons right">more_vert</i></h5>
            <p><a href="{{ action('ArticlesController@getShow', ['id' => $article->id]) }}">詳細はこちら</a></p>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">{{ $article->title }}<i class="material-icons right">close</i></span>
            <p>{!! nl2br($article->discription) !!}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div><!-- /.container -->

@stop