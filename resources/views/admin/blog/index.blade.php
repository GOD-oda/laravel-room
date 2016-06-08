@extends('layouts.admin_master')

@section('navbar')
  @include('admin.elements.navbar', ['logo' => 'Blog Manager'])
@endsection

{{-- sidebarは実装予定はない --}}
@section('sidebar')
  @include('admin.blog.sidebar')
@endsection

@section('content')
@if (Session::has('message'))
  <div class="col s12 alert">
    <div class="card-panel teal">
      <span class="white-text">
        <i class="material-icons prefix">info_outline</i>
        {{ session('message') }}
      </span>
    </div>
  </div>
@endif

{{-- 検索 --}}
{!! Form::open(['method' => 'post', 'url' => 'blog/search']) !!}
  <div class="row">
    <div class="input-field col s6">
      <i class="material-icons prefix">search</i>
      <input type="text" name="title" placeholder="記事名で検索" />
    </div>
    <div class="input-field col s4">
      <i class="material-icons prefix">search</i>
      <input type="text" name="published_at" class="datepicker" placeholder="公開日で検索"/>
    </div>
    {!! Form::submit('検索', ['class' => 'input-field btn waves-effect waves-light']) !!}
  </div>
{!! Form::close() !!}

<div class="row">
  <div class="col s12">
    <table class="responsive-table bordered">
      <thead>
        <tr>
          <th data-field="id">No</th>
          <th data-field="name">記事タイトル</th>
          <th>公開日</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($articles as $article)
          <tr>
            <td>{{ $article->id }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ date('Y/m/d H:i:s', strtotime($article->published_at)) }}</td>
            <td><a href="{{ action('Admin\BlogController@show', [$article->id]) }}"><i class="material-icons left">details</i>詳細</a></td>
            <td><a href="{{ action('Admin\BlogController@edit', [$article->id]) }}"><i class="material-icons left">edit</i>編集</a></td>
            <td>
              {!! Form::open(['method' => 'delete', 'action' => ['Admin\BlogController@destroy', $article->id]]) !!}
                <input type="submit" class="btn delete-btn" value="削除">
              {!! Form::close() !!}
            </td>
          </tr>
        @empty
          <tr>
            <td>検索結果は0件です</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('action_button')
  @include('admin.blog.elements.index_action_button')
@endsection

