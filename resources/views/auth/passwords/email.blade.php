@extends('layouts.main')

@section('page-styles')

    <link rel="stylesheet" href="/assets/css/pages/page_log_reg_v1.css">

@endsection

<!-- Main Content -->
@section('content')
<div class="container content">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <form class="reg-page" role="form" method="POST" action="{{ url('/password/email') }}">

                {{ csrf_field() }}

                <div class="reg-header">
                    <h2>{{ trans('login.reset_title') }}</h2>
                </div>

                @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="input-group margin-bottom-20 {{ $errors->has('email') ? ' has-error' : '' }}">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="email" placeholder="{{ trans('login.placeholders.email') }}" class="form-control" value="{{ old('email') }}">
                </div>
                @if ($errors->has('email'))
                    <span class="help-block color-red">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <button class="btn-u btn-submit pull-right" type="submit">{{ trans('login.send_reset') }}</button>
                    </div>
                </div>

            </form>
        </div>
    </div><!--/row-->
</div><!--/container-->

@endsection
