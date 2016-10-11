@extends('layouts.main')

@section('page-styles')

    <link rel="stylesheet" href="/assets/plugins/brand-buttons/brand-buttons.css">
    <link rel="stylesheet" href="/assets/css/pages/page_log_reg_v1.css">

@endsection

@section('content')

    <div class="container content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <form class="reg-page" role="form" method="POST" action="{{ url('/register') }}">

                    {{ csrf_field() }}

                    <div class="reg-header">
                        <h2>{{ trans('register.form_title') }}</h2>
                        <p>{{ trans('register.already_registered') }}? <a href="{{ route('login') }}" class="">{{ trans('register.sign_in_label') }}</a> {{ trans('register.to_login_your_account') }}</p>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label>{{ trans('register.username_label') }} <span class="color-red">*</span></label>
                            <input name="username" type="text" value="{{ old('username') }}" class="form-control margin-bottom-20">


                            @if ($errors->has('username'))
                                <span class="help-block color-red">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    {{--<div class="row">--}}
                        {{--<div class="col-md-6">--}}
                            {{--<label>{{ trans('register.first_name_label') }}</label>--}}
                            {{--<input name="first_name" type="text" class="form-control margin-bottom-20">--}}

                            {{--@if ($errors->has('first_name'))--}}
                                {{--<span class="help-block color-red">--}}
                            {{--<strong>{{ $errors->first('first_name') }}</strong>--}}
                        {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<label>{{ trans('register.last_name_label') }}</label>--}}
                            {{--<input name="last_name" type="text" class="form-control margin-bottom-20">--}}

                            {{--@if ($errors->has('last_name'))--}}
                                {{--<span class="help-block color-red">--}}
                            {{--<strong>{{ $errors->first('last_name') }}</strong>--}}
                        {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    {{--</div>--}}




                    <label>{{ trans('register.email_label') }} <span class="color-red">*</span></label>
                    <input name="email" type="text" value="{{ old('email') }}" class="form-control margin-bottom-20">

                    @if ($errors->has('email'))
                        <span class="help-block color-red">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    <div class="row">
                        <div class="col-sm-6">
                            <label>{{ trans('register.password_label') }} <span class="color-red">*</span></label>
                            <input name="password" type="password" class="form-control margin-bottom-20">

                            @if ($errors->has('password'))
                                <span class="help-block color-red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif

                        </div>
                        <div class="col-sm-6">
                            <label>{{ trans('register.password_confirm_label') }} <span class="color-red">*</span></label>
                            <input name="password_confirmation" type="password" class="form-control margin-bottom-20">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block color-red">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-6 checkbox">
                            <label>
                                <input type="checkbox">
                                {{ trans('register.i_read') }} <a href="/" class="">{{ trans('register.terms_and_conditions') }}</a>
                            </label>
                        </div>
                        <div class="col-lg-6 text-right">
                            <button class="btn-u btn-submit" type="submit">{{ trans('register.register_button') }}</button>
                        </div>
                    </div>

                    <hr>

                    <div class="social-login text-center">
                        <p>Registruj se preko društvene mreže</p>
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

                </form>
            </div>
        </div>
    </div><!--/container-->

@endsection
