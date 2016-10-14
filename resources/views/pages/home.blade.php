@extends('layouts.main')

@section('page-styles')

    <link rel="stylesheet" href="assets/css/pages/blog_masonry_3col.css">

@endsection

@section('content')

    <!-- Google Map -->
    <div id="map" class="map">
    </div><!---/map-->
    <!-- End Google Map -->

    <div class="purchase">
        <div class="container overflow-h">
            <div class="row">
                <div class="col-md-9 animated fadeInLeft">
                    <span>Prijavi saobraćajne prekršaje na putevima u Crnoj Gori</span>
                    <p>Savjesno.me je građanska inicijativa i nije povezana sa državnim institucijama. Svi podaci pondosioca ostaju zaštićeni i nisu vidljivi. Smatramo da ovakav portal može da popravi saobraćajnu kulturu u Crnoj Gori, ukoliko želiš da daš doprinos <a href="#contact-us">javi</a> nam se.</p>
                </div>
                <div class="col-md-3 btn-buy animated fadeInRight">
                    <a href="{{ route('incident.index') }}" class="btn-u btn-u-lg"><i class="fa fa-check"></i> Prijavi</a>
                </div>
            </div>
        </div>
    </div>

    <div class="blog_masonry_3col">
        <div class="container content grid-boxes">

            <?php $index = 1; ?>
            @foreach($incidents as $incident)

                @if($index == 2)
                        <div class="grid-boxes-in grid-boxes-qoute">
                            <div class="grid-boxes-caption grid-boxes-quote">
                                <p>Ne brže od života</p>
                                <span>- Monteniggers -</span>
                            </div>
                        </div>
                @endif

            <div class="grid-boxes-in">
                @if ($incident->videos()->count() != 0)
                <div class="responsive-video">
                    <iframe  src="{{ $incident->videos()->first()->url }}?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" scrolling="no" allowfullscreen></iframe>
                </div>
                @else
                <img class="img-responsive" src="/{{ $incident->getFirstImageUrl() }}">
                @endif

                <div class="grid-boxes-caption">
                    <h3><a href="{{ route('public.incident', ['slug' => $incident->slug]) }}">{{ $incident->title }}</a></h3>
                    <ul class="list-inline grid-boxes-news">
                        <li><i class="fa fa-user"></i> <a href="#">{{ $incident->user->username }}</a></li>
                        <li>|</li>
                        <li><i class="fa fa-clock-o"></i> {{ date('d-m-Y', strtotime($incident->created_at)) }}</li>
                        <li>|</li>
                        <li><a href="{{ route('public.incident', ['slug' => $incident->slug]) }}"><i class="fa fa-comments-o"></i> 0</a></li>
                    </ul>
                    <p>{{ $incident->description }}</p>
                </div>
            </div>

                <?php $index++; ?>
            @endforeach

        </div><!--/container-->
    </div>

@endsection

@section('footer-scripts')

    <script>

                function initMap() {
                    var map;
                    $(document).ready(function(){
                        map = new GMaps({
                            div: '#map',
                            scrollwheel: false,
                            lat: 42.7040591,
                            lng: 18.8338565,
                            zoom: 9
                        });

                        @foreach($incidents as $incident)

                            @if($incident->coordinate_x != null && $incident->coordinate_y != null)
                        var marker = map.addMarker({
                            lat: {{ $incident->coordinate_x }},
                            lng: {{ $incident->coordinate_y }},
                            title: '{{ $incident->title }}',
                            infoWindow: {
                                content: '<p><a href="{{ route('public.incident', ['slug' => $incident->slug]) }}">{{ $incident->title }}</a></p>'
                            }
                        });
                        @endif

                        @endforeach
                    });
                }

                //Panorama Map
                function initPanorama() {
                    var panorama;
                    $(document).ready(function(){
                        panorama = GMaps.createPanorama({
                            el: '#panorama',
                            lat : 42.7040591,
                            lng : 18.8334565
                        });
                    });
                }

                //Masonry js functions
                $(document).ready(function(){
                    var $container = $('.grid-boxes');

                    var gutter = 30;
                    var min_width = 300;
                    $container.imagesLoaded( function(){
                        $container.masonry({
                            itemSelector : '.grid-boxes-in',
                            gutterWidth: gutter,
                            isAnimated: true,
                            columnWidth: function( containerWidth ) {
                                var box_width = (((containerWidth - 2*gutter)/3) | 0) ;

                                if (box_width < min_width) {
                                    box_width = (((containerWidth - gutter)/2) | 0);
                                }

                                if (box_width < min_width) {
                                    box_width = containerWidth;
                                }

                                $('.grid-boxes-in').width(box_width);

                                return box_width;
                            }
                        });
                    });
                });

    </script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCtWlllV64Cp7GucyYAYIM9GjeIeAOHzQ8&callback=initMap"></script>
    <script type="text/javascript" src="/assets/plugins/gmap/gmap.js"></script>

@endsection