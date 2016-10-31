@extends('layouts.main')

@section('content')

    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Partneri</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Naslovna</a></li>
                <li class="active">Partneri</li>
            </ul>
        </div>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row">
            <div class="col-md-12">
                <div class="headline"><h2>Partneri</h2></div>

                <!-- Clients Block-->
                <div class="row clients-page">
                    <div class="col-md-4">
                       <a href="http://uspori.me" target="_blank"><img src="/assets/img/partners/1.jpg" class="img-responsive hover-effect" alt="" /></a>
                    </div>
                    <div class="col-md-8">
                        <h3>Uspori.me</h3>
                        <ul class="list-inline">
                            <li><i class="fa fa-map-marker color-yellow"></i> Nikšić</li>
                            <li><i class="fa fa-globe color-yellow"></i> <a class="linked" href="http://uspori.me" target="_blank">http://uspori.me</a></li>
                            <li><i class="fa fa-car"></i> Bezbjednost na putevima</li>
                        </ul>
                        <p>
                            USPORI.ME je stranica posvećena saobraćajnoj kulturi i bezbjednosti a osnovana je sa ciljem svakodnevnog informisanja i edukovanja crnogorske javnosti o pitanjima bezbjednosti saobraćaja, upoznavanja građana i institucija sa radom ALFA Centra u ovom polju i pružanje mogućnosti posjetiocima sajta da kroz sugestije i komentare doprinesu unapređenju ukupne saobraćajne kulture u Crnoj Gori.
                        </p>
                    </div>
                </div>
                <!-- End Clients Block-->
            </div>
        </div><!--/row-fluid-->
    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection