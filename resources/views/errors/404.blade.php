@extends('layouts.main')

@section('page-styles')

    <style>

        /*404 Error Page v1
        ------------------------------------*/
        .error-v1 {
            padding-bottom: 30px;
            text-align: center;
        }

        .error-v1 p {
            color: #555;
            font-size: 16px;
        }

        .error-v1 span {
            color: #555;
            display: block;
            font-size: 35px;
            font-weight: 200;
        }

        .error-v1 span.error-v1-title {
            color: #777;
            font-size: 180px;
            line-height: 200px;
            padding-bottom: 20px;
        }

        /*For Mobile Devices*/
        @media (max-width: 500px) {
            .error-v1 p {
                font-size: 12px;
            }

            .error-v1 span {
                font-size: 25px;
            }

            .error-v1 span.error-v1-title {
                font-size: 140px;
            }
        }
    </style>

@endsection

@section('content')

    <div class="container content">
        <!--Error Block-->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="error-v1">
                    <span class="error-v1-title">404</span>
                    <span>Došlo je do greške!</span>
                    <p>Traženi URL ne postoji na našem sajtu.</p>
                    <a class="btn-u btn-bordered" href="/">Naslovna</a>
                </div>
            </div>
        </div>
        <!--End Error Block-->
    </div>

@endsection