@extends('layouts.login_master')

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


  <form method="post" class="col s12 center">
    {!! csrf_field() !!}

    <div class="row">
      <div class="input-field col s6 offset-s3">
        <i class="material-icons prefix">account_circle</i>
        <input id="icon_prefix" class="validate" type="text" name="name">
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
<!--
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
@endsection