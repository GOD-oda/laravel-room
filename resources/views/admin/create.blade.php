@extends('layouts.admin_master')

@section('content')


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
  {!! Form::open(['route' => 'admin.store']) !!}
    {!! Form::hidden('user_id', 1, ['class' => 'input-field']) !!}

    @include('elements.form', ['submitButtonName' => '新規作成', 'icon' => 'fiber_new'])

  {!! Form::close() !!}

  @include('elements.action_button')
</div>

@stop