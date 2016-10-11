@extends('layouts.main')

@section('content')

    <!--=== Blog Posts ===-->
    <div class="bg-color-light">
        <div class="container content-sm">
            <div class="row">
                <!-- Blog All Posts -->
                <div class="col-md-9">
                    <!-- News v3 -->
                    <div class="news-v3 bg-color-white margin-bottom-30">
                        <div class="responsive-video">
                            <iframe  src="{{ $incident->videos()->first()->url }}" frameborder="0" scrolling="no" allowfullscreen></iframe>
                        </div>
                        <div class="news-v3-in">
                            <ul class="list-inline posted-info">
                                <li><i class="fa fa-user"></i> <a href="#">{{ $incident->user->username }}</a></li>
                                <li>Postovano {{ date('Y-M-d', strtotime($incident->created_at)) }}</li>
                            </ul>
                            <h2><a href="#">{{ $incident->title }}</a></h2>
                            <p>
                                {{ $incident->description }}
                            </p>
                        </div>
                    </div>
                    <!-- End News v3 -->

                </div>
                <!-- End Blog All Posts -->

                <!-- Blog Sidebar -->
                <div class="col-md-3">
                    <div class="headline-v2"><h2>Najnovije</h2></div>
                    <!-- Trending -->
                    <ul class="list-unstyled blog-trending margin-bottom-50">

                    @foreach($latest as $post)
                        <li>
                            <h3><a href="{{ route('public.incident', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h3>
                            <small>{{ date('d, M Y', strtotime($post->created_at)) }} / <i class="fa fa-comment"></i> 0</small>
                        </li>
                    </ul>
                    @endforeach

                </div>
                <!-- End Blog Sidebar -->
            </div>
        </div><!--/end container-->
    </div>
    <!--=== End Blog Posts ===-->


@endsection