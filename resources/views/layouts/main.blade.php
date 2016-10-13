<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>Savjesno.me | Građani javljaju</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ivan Radunovic">

    <meta name="description" itemprop="description" content="Many users surf the web with disabled JavaScript or blocked GA universal code, with this solution you&#039;ll be able to log them all.">
    <meta name="keywords" itemprop="keywords" content="Google Analytics,Measurement Protocol,disabled JavaScript,noJS,blocked ga,">

    <meta property="og:url" content="https://savjesno.me">
    <meta property="og:title" content="Prijavi saobraćajne prekršaje na putevima u Crnoj Gori">
    <meta property="og:description" content="Savjesno.me je građanska inicijativa i nije povezana sa državnim institucijama. Svi podaci pondosioca ostaju zaštićeni i nisu vidljivi. Smatramo da ovakav portal može da popravi saobraćajnu kulturu u Crnoj Gori, ukoliko želiš da daš doprinos javi nam se.">
    <meta property="og:image" content="https://savjesno.me/assets/img/savjesno-og-img.png">
    <meta property="og:site_name" content="Savjesno.me">
    <meta property="og:image:type" content="image/png">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/img/favicon.png">

    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="/assets/css/headers/header-default.css">
    <link rel="stylesheet" href="/assets/css/footers/footer-v1.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

    <!-- CSS Page Style -->
    @yield('page-styles')

    <!-- CSS Theme -->
    <link rel="stylesheet" href="/assets/css/theme-colors/default.css" id="style_color">
    <link rel="stylesheet" href="/assets/css/theme-skins/dark.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="/assets/css/custom.css">
</head>

<body class="index-page" data-page="index">
<div class="wrapper">
    <!--=== Header ===-->
    <div class="header">
        <div class="container">
            <!-- Logo -->
            <a class="logo" href="/">
                @include('partials.logo')
            </a>
            <!-- End Logo -->

            <!-- Topbar -->
            <div class="topbar">
                <ul class="loginbar pull-right">
                    <li><a href="#">Podgorica {{ \Carbon\Carbon::now() }}</a></li>
                    <li class="topbar-devider"></li>
                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                    <li class="topbar-devider"></li>
                    @if(!auth()->check())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li class="topbar-devider"></li>
                    <li><a href="{{ url('/register') }}">Registracija</a></li>
                    @else
                    <li><a href="#">{{ auth()->user()->username }}</a></li>
                    <li class="topbar-devider"></li>
                    <li><a href="/logout">Odjava</a></li>
                    @endif
                </ul>
            </div>
            <!-- End Topbar -->

            <!-- Toggle get grouped for better mobile display -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars"></span>
            </button>
            <!-- End Toggle -->
        </div><!--/end container-->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
            <div class="container">
                <ul class="nav navbar-nav">

                    <li>
                        <a href="http://forum.savjesno.me">Forum</a>
                    </li>
                    <li class="">
                        <a href="{{ route('incident.index') }}">Prijavi prekršaj</a>
                    </li>
                    {{--<li class="dropdown mega-menu-fullwidth">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            Prekršaji
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="mega-menu-content disable-icons">
                                    <div class="container">
                                        <div class="row equal-height">
                                            <div class="col-md-3 equal-height-in">
                                                <ul class="list-unstyled equal-height-list">
                                                    <li><a href="One-Pages/Accounting/index.html">Accounting</a></li>
                                                    <li><a href="One-Pages/Agency/index.html">Agency</a></li>
                                                    <li><a href="One-Pages/Architecture/index.html">Architecture</a></li>
                                                    <li><a href="One-Pages/Business/index.html">Business</a></li>
                                                    <li><a href="One-Pages/Charity/index.html">Charity</a></li>
                                                    <li><a href="Landing-Pages/Consulting/index.html">Consulting</a></li>
                                                    <li><a href="One-Pages/Courses/index.html">Courses</a></li>
                                                </ul>
                                            </div>

                                            <div class="col-md-3 equal-height-in">
                                                <ul class="list-unstyled equal-height-list">
                                                    <li><a href="One-Pages/Construction/index.html">Construction</a></li>
                                                    <li><a href="One-Pages/Gym/index.html">Gym</a></li>
                                                    <li><a href="One-Pages/Lawyer/index.html">Lawyer</a></li>
                                                    <li><a href="One-Pages/App/index.html">Mobile App</a></li>
                                                    <li><a href="One-Pages/Music/index.html">Music <small class="color-red">New</small></a></li>
                                                    <li><a href="One-Pages/RealEstate/index.html">Real Estate</a></li>
                                                    <li><a href="One-Pages/Restaurant/index.html">Restaurant</a></li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>--}}
                    <!-- End Demo Pages -->

                    {{--<!-- Search Block -->--}}
                    {{--<li>--}}
                        {{--<i class="search fa fa-search search-btn"></i>--}}
                        {{--<div class="search-open">--}}
                            {{--<div class="input-group animated fadeInDown">--}}
                                {{--<input type="text" class="form-control" placeholder="Unesi termin">--}}
                                {{--<span class="input-group-btn">--}}
										{{--<button class="btn-u" type="button">Traži</button>--}}
									{{--</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<!-- End Search Block -->--}}
                </ul>
            </div><!--/end container-->
        </div><!--/navbar-collapse-->
    </div>
    <!--=== End Header ===-->


    <!--=== Content Part ===-->
    @yield('content')
    <!--=== End Content Part ===-->

    <!--=== Footer Version 1 ===-->
    <div class="footer-v1" id="contact-us">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <!-- About -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <a href="/">
                            @include('partials.logo')
                        </a>
                        <p style="margin-top:5px;">Savjesno.me je portal čiji sadržaj kreiraju posjetioci. Trenutno najbitnija tema u Crnoj Gori je bezbjednost u saobraćaju zato smo se fokusirali na prijave saobraćajnih prekršaja.</p>
                        <p>Na gornjoj mapi možete vidjeti sve prijavljene saobraćajne prestupe, a klikom na dugme Javi možete okačiti novi post.</p>
                    </div><!--/col-md-3-->
                    <!-- End About -->

                    {{--<!-- Latest -->--}}
                    {{--<div class="col-md-3 md-margin-bottom-40">--}}
                        {{--<div class="posts">--}}
                            {{--<div class="headline"><h2>Latest Posts</h2></div>--}}
                            {{--<ul class="list-unstyled latest-list">--}}
                                {{--<li>--}}
                                    {{--<a href="#">Incredible content</a>--}}
                                    {{--<small>May 8, 2014</small>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">Best shoots</a>--}}
                                    {{--<small>June 23, 2014</small>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">New Terms and Conditions</a>--}}
                                    {{--<small>September 15, 2014</small>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div><!--/col-md-3-->--}}
                    {{--<!-- End Latest -->--}}

                    <!-- Link List -->
                    <div class="col-md-offset-3 col-md-3 md-margin-bottom-40">
                        <div class="headline"><h2>Open Source projekat</h2></div>
                        <p>Savjesno.me je projekat otvorenog koda i možeš se uključiti u njegov dalji razvoj putem našeg <a href="https://github.com/codingo-me/savjesno.me" style="color:#fff;">Github</a> repozitorijuma.</p>
                        <p>Ukoliko programiraš/dizajniraš mobilne aplikacije i želiš da doprineseš projektu, javi nam se.</p>
                    </div><!--/col-md-3-->
                    <!-- End Link List -->

                    <!-- Address -->
                    <div class="col-md-3 map-img md-margin-bottom-40">
                        <div class="headline"><h2>Kontaktiraj nas</h2></div>
                        <address class="md-margin-bottom-40">
                            Podgorica, Crna Gora <br>
                            Email: <a href="mailto:info@savjesno.me" class="yellow-color">info@savjesno.me</a>
                        </address>
                    </div><!--/col-md-3-->
                    <!-- End Address -->
                </div>
            </div>
        </div><!--/footer-->

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            2016 &copy; Sva prava zadržana.
                            <a href="{{ route('privacy') }}" class="yellow-color">Politika privatnosti</a> | <a href="{{ route('terms') }}" class="yellow-color">Uslovi korišćenja</a>
                        </p>
                    </div>

                    <!-- Social Links -->
                    <div class="col-md-6">
                        <ul class="footer-socials list-inline">
                            <li>
                                <a href="https://www.facebook.com/Savjesnome-351336615210537" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://github.com/codingo-me/savjesno.me" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Github">
                                    <i class="fa fa-github"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Social Links -->
                </div>
            </div>
        </div><!--/copyright-->
    </div>
    <!--=== End Footer Version 1 ===-->
</div><!--/wrapper-->

<!-- JS Global Compulsory -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="/assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.4/SmoothScroll.min.js"></script>
<script type="text/javascript" src="/assets/plugins/masonry/jquery.masonry.min.js"></script>
<!-- JS Customization -->
@yield('footer-scripts')

<script type="text/javascript" src="/assets/js/custom.js"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="/assets/js/app.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
    });
</script>
<!--[if lt IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="/assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-85513592-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>
