@extends('layouts.admin_master')

@section('navbar')
  @include('admin.elements.navbar', ['logo' => 'Create New Payment'])
@endsection

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
  {!! Form::open(['route' => 'payment.store']) !!}
    {!! Form::hidden('user_id', 1, ['class' => 'input-field']) !!}

    @include('admin.payment.elements.form', ['submitButtonName' => '新規作成', 'icon' => 'fiber_new'])

  {!! Form::close() !!}
</div>
@endsection

@section('action_button')
  @include('admin.payment.elements.create_action_button')
@endsection