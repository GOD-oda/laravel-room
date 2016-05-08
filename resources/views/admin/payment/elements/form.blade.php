<br>
<div class="row">
  <div class="col s3">
    種類
  </div>
  <div class="input-field col s3">
    {!! Form::select('type', $type) !!}
  </div>
</div>
<div class="row">
  <div class="col s3">
    金額
  </div>
  <div class="input-field col s3">
    {!! Form::text('utility_charges', null) !!}
  </div>
</div>
<div class="row">
  <div class="col s3">
    支払日
  </div>
  <div class="input-field col s3">
    {!! Form::text('pay_day', null) !!}
  </div>
</div>
<div class="row">
  <div class="input-field col s6">
    <i class="material-icons left">{{ $icon }}</i>
    {!! Form::submit($submitButtonName, ['class' => 'btn waves-effect waves-light']) !!}
  </div>
</div>