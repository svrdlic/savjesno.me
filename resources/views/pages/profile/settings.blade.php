@extends('layouts.main')
<!-- CSS Page Style -->
@section('page-styles')
	<link rel="stylesheet" href="/assets/css/pages/profile.css">
	<link rel="stylesheet" href="/assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="/assets/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
	<link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
@stop
@section('content')

    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">{{ $profile->username }}</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Naslovna</a></li>
                <li class="active">Profil</li>
            </ul>
        </div>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

		<!--=== Profile ===-->
		<div class="container content profile">
			<div class="row">

			<!--Left Sidebar-->
            @include('pages.profile.sidebar')
            <!--End Left Sidebar-->

				<!-- Profile Content -->
				<div class="col-md-9">
					<div class="profile-body margin-bottom-20">
						<div class="tab-v1">
							<ul class="nav nav-justified nav-tabs">

								<li  class="active" ><a data-toggle="tab" href="#editTab">{{ trans('profile.form_title') }}</a></li>

							</ul>
							<div class="tab-content">

								<div id="editTab" class="profile-edit tab-pane  fade in active">
									{{--<h2 class="heading-md">{{ trans('profile.form_title') }}</h2>--}}
									{{--<p>Change your password.</p>--}}
									<br>
									<form class="sky-form" id="sky-form4" action="{{ route('profile.update') }}" enctype="multipart/form-data" method="post">
                                        {{ csrf_field() }}
{{--                                        <header>{{ trans('profile.form_title') }}</header>--}}

                                        @include('partials.errors')

										<dl class="dl-horizontal">
											<dt>{{ trans('profile.username') }}</dt>
											<dd>
												<section>
													<label class="input">
														<i class="icon-append fa fa-user"></i>
														<input type="text" placeholder="{{ trans('profile.placeholders.username') }}" name="username" value="{{ ( empty(old('username')) ? $profile->username : old('username') ) }}">
														{{--<b class="tooltip tooltip-bottom-right">Unesi novi username</b>--}}
													</label>
												</section>
											</dd>
											<dt>{{ trans('profile.email') }}</dt>
											<dd>
												<section>
													<label class="input">
														<i class="icon-append fa fa-envelope"></i>
														<input type="email" placeholder="{{ trans('profile.placeholders.email') }}" name="email" value="{{ ( empty(old('email')) ? $profile->email : old('email') ) }}">
														{{--<b class="tooltip tooltip-bottom-right">Unesi email adresu</b>--}}
													</label>
												</section>
											</dd>
                                            <dt>{{ trans('profile.picture') }}</dt>
                                            <dd>
                                                <section>
                                                        <label class="input input-file">
                                                            <div class="button"><input type="file" name="upload" id="file" class="file-input" onchange="this.parentNode.nextSibling.value = this.value">{{ trans('profile.browse') }}</div><input type="text" readonly>
                                                        </label>
                                                </section>
                                            </dd>

										</dl>
										<br>
										{{--<section>--}}
											{{--<label class="checkbox"><input type="checkbox" id="terms" name="terms"><i></i><a href="#">I agree with the Terms and Conditions</a></label>--}}
										{{--</section>--}}
										<button type="button" class="btn-u btn-u-default">Odustani</button>
										<button class="btn-u" type="submit">Snimi izmjene</button>
									</form>
								</div>


							</div>
						</div>
					</div>
				</div>
				<!-- End Profile Content -->
			</div><!--/end row-->
		</div>
		<!--=== End Profile ===-->

       @section('footer-scripts')

        <script type="text/javascript" src="/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>

        @stop

@endsection