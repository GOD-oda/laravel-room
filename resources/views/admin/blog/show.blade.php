@extends('layouts.admin_master')

@section('navbar')
  @include('admin.elements.navbar', ['logo' => 'Article Detail'])
@endsection

@section('content')
<div class="article-show">
  <div class="row">
    <div class="col s4">id</div>
    <div class="col s7">{{ $article->id }}</div>
  </div>

  <hr>

  <div class="row">
    <div class="col s4">パス</div>
    <div class="col s7">{{ $article->uri }}</div>
  </div>

  <hr>

  <div class="row">
    <div class="col s4">タイトル</div>
    <div class="col s7">{{ $article->title }}</div>
  </div>

  <hr>

  <div class="row">
    <div class="col s4">記事概要</div>
    <div class="col s7">{!! $article->discription !!}</div>
  </div>

  <hr>


  <div class="row">
    <div class="col s4">公開日</div>
    <div class="col s7">{{ $article->published_at }}</div>
  </div>

  <hr>

  <div class="row">
    <div class="col s4">記事内容</div>
    <div class="col s7">{!! $article->body !!}</div>
  </div>

  <hr>

  <div class="row">
    <div class="col s4">登録日時</div>
    <div class="col s7">{{ $article->created_at }}</div>
  </div>

  <hr>

  <div class="row">
    <div class="col s4">更新日時</div>
    <div class="col s7">{{ $article->updated_at }}</div>
  </div>
</div>
@endsection

@section('action_button')
  @include('admin.blog.elements.show_action_button')
@endsection