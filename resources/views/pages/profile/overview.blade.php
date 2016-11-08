@extends('layouts.main')
<!-- CSS Page Style -->
@section('page-styles')
	<link rel="stylesheet" href="/assets/css/pages/profile.css">
	<link rel="stylesheet" href="/assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="/assets/plugins/line-icons/line-icons.css">
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
					<div class="profile-body">
						<!--Service Block v3-->
						<div class="row margin-bottom-10">
							<div class="col-sm-6 sm-margin-bottom-20">
								<div class="service-block-v3 service-block-u">
									<i class="icon-users"></i>
									<span class="service-heading">Ukupno prijava</span>
									<span class="counter">{{ $incidents->count() }}</span>

									<div class="clearfix margin-bottom-10"></div>

									<div class="row margin-bottom-20">
										{{--<div class="col-xs-6 service-in">--}}
											{{--<small>Last Week</small>--}}
											{{--<h4 class="counter">1,385</h4>--}}
										{{--</div>--}}
										<div class="col-xs-12 text-right service-in">
											<small>U poslednjih 30 dana</small>
											<h4 class="counter">{{  $number_of_latest_incidents }}</h4>
										</div>
									</div>
									{{--<div class="statistics">--}}
										{{--<h3 class="heading-xs">Statistics in Progress Bar <span class="pull-right">67%</span></h3>--}}
										{{--<div class="progress progress-u progress-xxs">--}}
											{{--<div style="width: 67%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="67" role="progressbar" class="progress-bar progress-bar-light">--}}
											{{--</div>--}}
										{{--</div>--}}
										{{--<small>11% less <strong>than last month</strong></small>--}}
									{{--</div>--}}
								</div>
							</div>

						</div><!--/end row-->
						<!--End Service Block v3-->

						<hr>

						<div class="row margin-bottom-20">

							<!--Profile Event-->
							<div class="col-sm-12 md-margin-bottom-20">
								<div class="panel panel-profile no-bg">
									<div class="panel-heading overflow-h">
										<h2 class="panel-title heading-sm pull-left"><i class="fa fa-file-text-o"></i>Prijavljeni prekršaji</h2>
										{{--<a href="#"><i class="fa fa-cog pull-right"></i></a>--}}
									</div>
									<div id="scrollbar2" class="panel-body no-padding mCustomScrollbar" data-mcs-theme="minimal-dark">
                                        @foreach( $incidents as $incident )
										<div class="profile-event">
											<div class="date-formats">
												<span>{{ $incident->created_at->day  }}</span>
												<small>{{ $incident->created_at->month  }}, {{ $incident->created_at->year  }}</small>
											</div>
											<div class="overflow-h">
												<h3 class="heading-xs"><a href="{{ route('public.incident', ['slug' => $incident->slug]) }}">{{ $incident->title }}</a></h3>
												<p> lll {{   str_limit($incident->description, 100) }}</p>
											</div>
										</div>
                                        @endforeach
									</div>
								</div>
							</div>
							<!--End Profile Event-->

						</div><!--/end row-->

						<hr>

					</div>
				</div>
				<!-- End Profile Content -->
			</div>
		</div><!--/container-->
		<!--=== End Profile ===-->
    @section('footer-scripts')
	<script type="text/javascript" src="/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>

	<script type="text/javascript">
		jQuery(document).ready(function() {

			App.initCounter();

		});
	</script>
    @stop
@endsection