@extends('layouts.app')

@section('content')
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-sm-4">
                        <a href="{{ route('profile.create') }}" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-20">Bedrijf toevoegen</a>
                    </div>
                    <div class="col-sm-8">
                        <div class="project-sort pull-right">
                            <div class="project-sort-item">
                                <i class="fa fa-th-large" aria-hidden="true" style="font-size: 2em;"></i>
                                <i class="fa fa-th-list" aria-hidden="true" style="font-size: 2em;"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card-box project-box">
                            <div class="label label-warning">uitgelicht</div>
                            <h4 class="m-t-0 m-b-5"><a href="" class="text-inverse">Pendo.</a></h4>

                            <p class="text-success text-uppercase m-b-20 font-13">Maastricht</p>
                            <p class="text-muted font-13">
                                Pendo is een full service internet bureau gevestigd in Maasticht. Bij ons
                                kunt u terecht voor ontwikkeling van websites en applicaties, webhosting
                                en domeinnaam registratie en voor ontwerp en drukwerk.
                            </p>

                            <hr />

                            <ul class="list-inline">
                                <li>
                                    <p class="text-muted">Uurtarief</p>
                                    <h3 class="m-b-0">&euro; 65</h3>
                                </li>
                                <li>
                                    <p class="text-muted">Beschikbaar</p>
                                    <h3 class="m-b-0"><i class="fa fa-check" aria-hidden="true"></i></h3>
                                </li>
                                <li>
                                    <p class="text-muted">Contact</p>
                                    <h3 class="m-b-0"><i class="fa fa-envelope" aria-hidden="true"></i></h3>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card-box project-box">
                            <h4 class="m-t-0 m-b-5"><a href="" class="text-inverse">Google</a></h4>

                            <p class="text-success text-uppercase m-b-20 font-13">Amsterdam</p>
                            <p class="text-muted font-13">
                                Google, de zoekmachine gigant die inmiddels actief is op alle vlakken.
                                Sinds kort ontwikkeld Google ook applicaties in Laravel, neem geheel
                                vrijblijvend contact met ons op voor een offerte!
                            </p>

                            <hr />

                            <ul class="list-inline">
                                <li>
                                    <p class="text-muted">Uurtarief</p>
                                    <h3 class="m-b-0">&euro; 175</h3>
                                </li>
                                <li>
                                    <p class="text-muted">Beschikbaar</p>
                                    <h3 class="m-b-0"><i class="fa fa-times" aria-hidden="true"></i></h3>
                                </li>
                                <li>
                                    <p class="text-muted">Contact</p>
                                    <h3 class="m-b-0"><i class="fa fa-envelope" aria-hidden="true"></i></h3>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card-box project-box">
                            <div class="label label-warning">uitgelicht</div>
                            <h4 class="m-t-0 m-b-5"><a href="" class="text-inverse">Pendo.</a></h4>

                            <p class="text-success text-uppercase m-b-20 font-13">Maastricht</p>
                            <p class="text-muted font-13">
                                Pendo is een full service internet bureau gevestigd in Maasticht. Bij ons
                                kunt u terecht voor ontwikkeling van websites en applicaties, webhosting
                                en domeinnaam registratie en voor ontwerp en drukwerk.
                            </p>

                            <hr />

                            <ul class="list-inline">
                                <li>
                                    <p class="text-muted">Uurtarief</p>
                                    <h3 class="m-b-0">&euro; 65</h3>
                                </li>
                                <li>
                                    <p class="text-muted">Beschikbaar</p>
                                    <h3 class="m-b-0"><i class="fa fa-check" aria-hidden="true"></i></h3>
                                </li>
                                <li>
                                    <p class="text-muted">Contact</p>
                                    <h3 class="m-b-0"><i class="fa fa-envelope" aria-hidden="true"></i></h3>
                                </li>
                            </ul>

                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection
