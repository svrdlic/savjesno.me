@extends('layouts.main')

@section('page-styles')

    <link rel="stylesheet" href="/assets/css/pages/page_log_reg_v1.css">

@endsection

@section('content')

    <div class="container content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <form class="reg-page" role="form" method="POST" action="{{ url('/password/reset') }}">

                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="reg-header">
                        <h2>{{ trans('login.reset_title') }}</h2>
                    </div>

                    <div class="input-group margin-bottom-20 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="email" placeholder="{{ trans('login.placeholders.email') }}" class="form-control" value="{{ $email or old('email') }}" required autofocus>
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block color-red">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    <div class="input-group margin-bottom-20 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input name="password" type="password" placeholder="{{ trans('login.placeholders.password') }}" class="form-control" required>
                    </div>

                    @if ($errors->has('password'))
                        <span class="help-block color-red">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                    <div class="input-group margin-bottom-20 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input name="password_confirmation" type="password" placeholder="{{ trans('login.placeholders.password_confirm') }}" class="form-control" required>
                    </div>

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block color-red">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn-u pull-right btn-submit" type="submit">{{ trans('login.reset') }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div><!--/row-->
    </div><!--/container-->

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

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
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
