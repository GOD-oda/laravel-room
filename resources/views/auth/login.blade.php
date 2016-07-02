@extends('layouts.admin_master')

@section('navbar')
  @include('auth.elements.navbar')
@endsection

@section('content')
<div class="container">
  {{-- エラー表示 --}}
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

  <form method="post" class="col s12 center mt30">
    {!! csrf_field() !!}

    <div class="row">
      <div class="input-field col s6 offset-s3">
        <i class="material-icons prefix">account_circle</i>
        <input id="icon_prefix" class="validate input-filed" type="text" name="name">
          <label for="icon-prefix">Name</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6 offset-s3">
        <i class="material-icons prefix">vpn_key</i>
          <input id="icon_prefix" class="validate" type="password" name="password">
          <label for="icon-prefix">PassWord</label>
      </div>
    </div>
    <div class="row">
      <button class="btn waves-effect waves-light" type="submit">Login
        <i class="material-icons right">send</i>
      </button>
    </div>
  </form>
</div>
@endsection