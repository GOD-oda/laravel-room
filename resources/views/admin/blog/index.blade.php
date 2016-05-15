@extends('layouts.admin_master')

@section('sidebar')
  @include('admin.blog.sidebar')
@endsection

@section('content')
{{-- 検索 --}}
{!! Form::open(['method' => 'post', 'url' => 'blog/search']) !!}
  <div class="row">
    <div class="input-field col s6">
      <i class="material-icons prefix">search</i>
      <input type="text" name="title" placeholder="記事名で検索"/>
    </div>
    <div class="input-field col s4">
      <i class="material-icons prefix">search</i>
      <input type="text" name="published_at" class="datepicker" placeholder="公開日で検索"/>
    </div>
    {!! Form::submit('検索', ['class' => 'input-field btn waves-effect waves-light']) !!}
  </div>
{!! Form::close() !!}

<div class="row">
  <!-- 追加実装する予定
  <div class="col s3">
    left navigation
  </div>
  -->

  <div class="col s12">
    <table>
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
            <td><a href="{{ action('BlogController@show', [$article->id]) }}"><i class="material-icons left">details</i>詳細</a></td>
            <td><a href="{{ action('BlogController@edit', [$article->id]) }}"><i class="material-icons left">edit</i>編集</a></td>
            <td><i class="material-icons left">delete</i>削除</td>
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

