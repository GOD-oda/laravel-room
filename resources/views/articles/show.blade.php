@extends('layouts.home_master')

@section('content')
{{-- @include('elements.tabs') --}}

<div class="container">
  <h3>{{ $article->title }}</h3>

  <hr>

  {!! nl2br($article->body) !!}
</div>

@stop