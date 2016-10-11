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

                    <div id="disqus_thread"></div>
                    <script>

                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                         var disqus_config = function () {
                         this.page.url = '{{ request()->url() }}';  // Replace PAGE_URL with your page's canonical URL variable
                         this.page.identifier = '{{ $incident->slug }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                         };

                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');
                            s.src = '//savjesno.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


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