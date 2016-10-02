@extends('layouts.home_master')

@section('content')
<article>
  <div class="article-show">
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
</article>
@stop