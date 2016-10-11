@extends('layouts.main')

@section('content')

<div class="container content">
    <div class="row">
        <div class="col-md-9">

            <div class="alert alert-success fade in margin-bottom-40">
                <h4>Bravo, uradio si jedno dobro djelo!</h4>
                <p>Uspješno si prijavio saobraćajni prekršaj <b>{{ $incident_title }}</b> i posredno si nekome spasio život. Magistralni putevi i ulice nisu mjesto za trku i divljačku vožnju.</p>
                <p>Ako imaš još snimljenih prekršaja možeš i njih prijaviti <a href="{{ route('incident.index') }}">ovdje</a>.</p>
                <p><b>Prijava će biti objavljena kad je naši moderatori odobre i okače snimke na Youtube.</b></p>
                <p><small>Zadržavamo pravo da određeni segment prijave modifikujemo kako bi prekršaj učinili jasnijim.</small></p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="shadow-wrapper">
                        <blockquote class="hero box-shadow shadow-effect-2">
                            <p><em>"Ne brže od života"</em></p>
                            <small><em>Monteniggers</em></small>
                        </blockquote>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="shadow-wrapper">
                        <blockquote class="hero box-shadow shadow-effect-2">
                            <p><em>"Drvo nikada nije udarilo u auto, sem u samoodbrani"</em></p>
                            <small><em>američka poslovica</em></small>
                        </blockquote>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection