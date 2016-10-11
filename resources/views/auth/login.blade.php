@extends('layouts.main')

@section('page-styles')

    <link rel="stylesheet" href="/assets/plugins/brand-buttons/brand-buttons.css">
    <link rel="stylesheet" href="/assets/css/pages/page_log_reg_v1.css">

@endsection

@section('content')

    <div class="container content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <form class="reg-page" role="form" method="POST" action="{{ url('/login') }}">

                    {{ csrf_field() }}

                    <div class="reg-header">
                        <h2>{{ trans('login.form_title') }}</h2>
                    </div>

                    <div class="input-group margin-bottom-20 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="email" placeholder="{{ trans('login.placeholders.email') }}" class="form-control" value="{{ old('email') }}">
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block color-red">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    <div class="input-group margin-bottom-20 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input name="password" type="password" placeholder="{{ trans('login.placeholders.password') }}" class="form-control">
                    </div>

                    @if ($errors->has('password'))
                        <span class="help-block color-red">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                    <div class="row">
                        <div class="col-md-6 checkbox">
                            <label><input type="checkbox" name="remember"> {{ trans('login.remember') }}</label>
                        </div>
                        <div class="col-md-6">
                            <button class="btn-u pull-right btn-submit" type="submit">{{ trans('login.login') }}</button>
                        </div>
                    </div>

                    <hr>

                    <div class="social-login text-center">
                        <p>Prijavi se preko društvene mreže</p>
                        <ul class="list-inline margin-bottom-20">
                            <li>
                                <a href="{{ route('social.redirect', ['provider' => 'facebook']) }}" class="btn rounded btn-lg btn-facebook">
                                    <i class="fa fa-facebook"></i> Facebook
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('social.redirect', ['provider' => 'twitter']) }}" class="btn rounded btn-lg btn-twitter">
                                    <i class="fa fa-twitter"></i> Twitter
                                </a>
                            </li>
                        </ul>
                    </div>

                    <hr>

                    <h4>{{ trans('login.forgot') }}</h4>
                    <p>bez brige, <a class="" href="{{ url('/password/reset') }}">klikni ovdje</a> za reset lozinke.</p>
                </form>
            </div>
        </div><!--/row-->
    </div><!--/container-->

@endsection
