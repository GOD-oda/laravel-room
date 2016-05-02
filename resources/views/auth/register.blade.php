@extends('layouts.login_master')

@section('content')
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

    <form method="post" class="col s12 center">
        {!! csrf_field() !!}

        <div class="row">
            <div class="input-field col s6 offset-s3">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" class="validate" type="text" name="name">
                <label for="icon-prefix">ユーザー名</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <i class="material-icons prefix">email</i>
                <input id="icon_prefix" class="validate" type="text" name="email">
                <label for="icon-prefix">メールアドレス</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <i class="material-icons prefix">vpn_key</i>
                <input id="icon_prefix" class="validate" type="password" name="password">
                <label for="icon-prefix">パスワード</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <i class="material-icons prefix">vpn_key</i>
                <input id="icon_prefix" class="validate" type="password" name="password_confirmation">
                <label for="icon-prefix">確認用パスワード</label>
            </div>
        </div>
        <div class="row">
            <button class="btn waves-effect waves-light" type="submit">Register
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
</div>
<!--
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Register</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
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
