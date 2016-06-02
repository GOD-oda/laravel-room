@extends('layouts.home_master')

@section('content')
{{-- @include('elements.tabs') --}}

<div class="container">
  <div class="section">
    <div class="article-show">
      <h1>{{ $article->title }}</h1>
      <div class="divider"></div>
      {!! $article->body !!}
    </div>
  </div>

  <div class="divider"></div>

  <div class="section">
  <div class="article-comment">
    <div class="row">
      <div class="col s12">
        test
      </div>
    </div>
    <!-- @include('articles.elements.comment_form') -->
  </div>
  </div>
</div>

@stop