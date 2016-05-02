@extends('layouts.admin_master')

@section('content')
<br>

<div class="container">
  @if ($errors->has())
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
    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['AdminController@update', $article->id]]) !!}
      {!! Form::hidden('id', $article->id, ['class' => 'input-field']) !!}
      {!! Form::hidden('user_id', 1, ['class' => 'input-field']) !!}

      @include('elements.form', ['submitButtonName' => '更新', 'icon' => 'update'])

    {!! Form::close() !!}

    @include('elements.action_button')

</div>

@stop