@extends('layouts.home_master')

@section('content')
<div class="container">
  @if (Session::has('mail_success'))
    <div class="row">
      <div class="col s12">
        <div class="card-panel teal mail_success">
          <span class="white-text">
            お問い合わせありがとうございました。<br />
            これからも、当ブログを宜しくお願いします。
          </span>
        </div>
      </div>
    </div>
  @endif
  <div class="row">
    <h1>
      お問い合わせフォーム
    </h1>
    <p>どうぞお気軽にご連絡ください。</p>

    {!! Form::open(['method' => 'post', 'id' => 'contact-form']) !!}
    @if ($errors->has('name'))
      <div class="row">
        <div class="pink-text text-lighten-3">
          <span>{{ $errors->first('name') }}</span>
        </div>
      </div>
    @endif
    <div class="row">
      <div class="input-field col s12">
        <i class="material-icons prefix">account_circle</i>
        {!! Form::text('name', old('name'), ['class' => 'input-field', 'id' => 'name']) !!}
        {!! Form::label('name', 'お名前（必須項目）') !!}
      </div>
    </div>
    @if ($errors->has('email'))
      <div class="row">
        <div class="pink-text text-lighten-3">
          <span>{{ $errors->first('email') }}</span>
        </div>
      </div>
    @endif
    <div class="row">
      <div class="input-field col s12">
        <i class="material-icons prefix">email</i>
        {!! Form::email('email', old('email'), ['class' => 'input-field validate', 'id' => 'email']) !!}
        {!! Form::label('email', 'メールアドレス（必須項目）', ['data-error' => 'NG', 'data-success' => 'OK']) !!}
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <i class="material-icons prefix">http</i>
        {!! Form::text('uri', null, ['class' => 'input-field', 'id' => 'uri']) !!}
        {!! Form::label('uri', 'サイトURL') !!}
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <i class="material-icons prefix">subtitles</i>
        {!! Form::text('title', null, ['class' => 'input-field', 'id' => 'title']) !!}
        {!! Form::label('title', '件名') !!}
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <i class="material-icons prefix">textsms</i>
        {!! Form::textarea('body', null, ['class' => 'materialize-textarea', 'id' => 'body', 'row' => 5]) !!}
        {!! Form::label('body', '本文') !!}
      </div>
    </div>
    <div class="row">
      <div class="input-field">
        {!! Form::checkbox('confirm', null, null, ['id' => 'confirm-check']) !!}
        {!! Form::label('confirm-check', '上記の内容でよろしければ、チェックを入れてください。') !!}
      </div>
    </div>
    <div class="row">
      <div class="input-field" id="confirm-btn">
        {!! Form::submit('送信', ['class' => 'btn waves-effect waves-light disabled']) !!}
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div><!-- /.container -->
@stop