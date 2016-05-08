@extends('layouts.admin_master')

@section('content')

  {{-- 検索 --}}
  <form method="GET">
    <div class="row">
      <div class="input-field col s8 offset-s2">
        <i class="material-icons prefix">search</i>
        <input type="text" name="search" placeholder="記事名で検索"/>
      </div>
    </div>
  </form>

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
          @foreach ($articles as $article)
          <tr>
            <td>{{ $article->id }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ date('Y/m/d H:i:s', strtotime($article->published_at)) }}</td>
            <td><a href="{{ action('BlogController@show', [$article->id]) }}"><i class="material-icons left">details</i>詳細</a></td>
            <td><a href="{{ action('BlogController@edit', [$article->id]) }}"><i class="material-icons left">edit</i>編集</a></td>
            <td><i class="material-icons left">delete</i>削除</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@include('elements.action_button')

@stop