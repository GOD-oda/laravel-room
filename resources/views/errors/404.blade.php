@extends('layouts.home_master')

@section('content')
<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="error-404">
        <span class="error-text">大変申し訳ございません。お探しのページは見つかりませんでした。</span>
        <div class="mt30">
          <a href="{{ route('top') }}" class="btn-back">TOPへ戻る</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection