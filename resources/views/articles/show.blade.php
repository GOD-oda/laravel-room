@extends('layouts.home_master')

@section('content')
{{-- @include('elements.tabs') --}}

<div class="container">
  <div class="article-show">
    <h4>{{ $article->title }}</h4>

    <div class="divider"></div>

    {!! nl2br($article->body) !!}
  </div>
</div>

@stop