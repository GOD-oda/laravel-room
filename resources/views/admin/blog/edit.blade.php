@extends('layouts.admin_master')

@section('navbar')
  @include('admin.elements.navbar', ['logo' => 'Article Edit'])
@endsection

@section('content')
@if (count($errors) > 0)
  <div class="row">
    <div class="col s6 offset-s3">
      <div class="card-panel">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endif

<div class="row">
  {!! Form::model($article, ['method' => 'PATCH', 'action' => ['Admin\BlogController@update', $article->id], 'files' => true]) !!}
    {!! Form::hidden('id', $article->id, ['class' => 'input-field']) !!}

    @include('admin.blog.elements.form', ['submitButtonName' => '更新', 'icon' => 'update', 'tags' => $article->tags])
  {!! Form::close() !!}
</div>
@endsection

@section('action_button')
  @include('admin.blog.elements.edit_action_button')
@endsection
