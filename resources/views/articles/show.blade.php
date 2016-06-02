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
</div>

@stop