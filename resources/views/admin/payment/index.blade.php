@extends('layouts.admin_master')

@section('sidebar')
  @include('admin.payment.sidebar')
@endsection

@section('content')
{{-- 検索 --}}
{!! Form::open(['action' => 'PaymentController@search']) !!}
  <div class="row">
    <div class="input-field col s2">
      {!! Form::select('type', $type) !!}
    </div>
    <div class="input-field col s3">
      {!! Form::input('text', 'from_date', null, ['placeholder' => 'どこから']) !!}
    </div>
    <div class="input-field col s3">
      {!! Form::input('text', 'to_date', null, ['placeholder' => 'どこまで']) !!}
    </div>
    <div class="col s1">
      {!! Form::submit('検索', ['class' => 'input-field btn waves-effect waves-light']) !!}
    </div>
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
          <th data-field="name">種類</th>
          <th>金額</th>
          <th>支払日</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($records as $key => $value)
          <tr>
            <td>{{ $value->id }}</td>
            <td>{{ processPaymentType($value->type) }}</td>
            <td>{{ $value->utility_charges }}円</td>
            <td>{{ $value->pay_day }}</td>
            <td><a href="#"><i class="material-icons left">edit</i>編集</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('action_button')
  @include('elements.action_button')
@endsection