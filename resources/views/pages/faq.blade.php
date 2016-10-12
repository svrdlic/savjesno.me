@extends('layouts.main')

@section('content')

    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">FAQ</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">Naslovna</a></li>
                <li class="active">FAQ</li>
            </ul>
        </div>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row">
            <div class="col-md-9">
                <!-- General Questions -->
                <div class="headline"><h2>Opšta pitanja</h2></div>
                <div class="panel-group acc-v1 margin-bottom-40" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    1. Šta garantuje sankcionisanje prekršaja?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                Sankcionisanje prekršaja može sankcionisati samo MUP, te stoga naša dužnost je da izvršimo građanski pritisak na institucije sistema kako bi one počele da procesuiraju prijavljene prekršaje.
                                Ako se ovdje okupi dovoljan broj građana ideja će da uspije i nadamo se da će to uticati na manje nesreće na našim putevima.
                            </div>
                        </div>
                    </div>

                </div><!--/acc-v1-->
                <!-- End General Questions -->


            </div><!--/col-md-9-->

            <div class="col-md-3">
                <!-- Contacts -->
                <div class="headline"><h2>Kontaktiraj nas</h2></div>
                <ul class="list-unstyled who margin-bottom-30">
                    <li><a href="mailto:info@savjesno.me"><i class="fa fa-envelope"></i>info@savjesno.me</a></li>
                </ul>
                <!-- End Contacts -->

                <!-- Business Hours -->
                <div class="headline"><h2>Kada smo online</h2></div>
                <ul class="list-unstyled margin-bottom-30">
                    <li><strong>Ponedeljak-Petak:</strong> 10am do 6pm</li>
                    <li><strong>Subota:</strong> 11am do 3pm</li>
                    <li><strong>Nedelja:</strong> Samo ležimo</li>
                </ul>
                <!-- End Business Hours -->

                <!-- Info Block -->
                <div class="headline"><h2>Želiš da pomogneš?</h2></div>
                <p>Odlično, pomoć nam je potrebna. Javi nam se ako si:</p>
                <ul class="list-unstyled margin-bottom-30">
                    <li><i class="fa fa-check color-orange"></i> NVO aktivista</li>
                    <li><i class="fa fa-check color-orange"></i> Student</li>
                    <li><i class="fa fa-check color-orange"></i> Novinar</li>
                    <li><i class="fa fa-check color-orange"></i> Programer</li>
                    <li><i class="fa fa-check color-orange"></i> Dizajner</li>
                    <li><i class="fa fa-check color-orange"></i> Zabrinuti građanin</li>
                </ul>
                <!-- End Info Block -->
                
            </div><!--/col-md-3-->
        </div><!--/row-->
    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection