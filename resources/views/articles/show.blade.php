@extends('layouts.home_master')

@section('content')
{{-- @include('elements.tabs') --}}

<div class="container">
  <div class="section">
    <div class="article-show">
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
      {!! $article->body !!}
    </div>
  </div>
</div>
@stop