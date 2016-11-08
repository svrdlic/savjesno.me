    {{--@section('sidebar')--}}
    <!--Left Sidebar-->
    <div class="col-md-3 md-margin-bottom-40">
        <img class="img-responsive profile-img margin-bottom-20" src="/{{ empty($profile->photo) ? 'assets/img/main/img1.jpg' : $profile->photo }}" alt="">


        <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
            <li class="list-group-item {{ (Route::currentRouteName() == 'public.profile')? 'active':''  }} ">
                <a href="{{ route( 'public.profile', $profile->slug ) }}"><i class="fa fa-bar-chart-o"></i> {{ trans('profile.overview') }}</a>
            </li>
            @if(  Auth::check() && $profile->id ==  auth()->user()->id )
            <li class="list-group-item {{ (Route::currentRouteName() == 'profile.edit')? 'active':''  }}  ">
                <a href="{{ route( 'profile.edit' ) }}"><i class="fa fa-cog"></i>  {{ trans('profile.settings') }}</a>
            </li>
            @endif
        </ul>

    </div>
    <!--End Left Sidebar-->
    {{--@endsection--}}