@extends('layouts.app')

@section('page_heading')
    <h4 class="page-title">Adresboek</h4>
@endsection

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
                                <!-- Nothing so far -->
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($profiles->chunk(3) as $rowProfiles)
                <div class="row">
                    @foreach($rowProfiles as $profile)
                    <div class="col-lg-4">
                        <div class="card-box project-box">
                            @if($profile->highlight == 1)
                            <div class="label label-warning">uitgelicht</div>
                            @endif

                            <h4 class="m-t-0 m-b-5"><a href="" class="text-inverse">{{ $profile->name }}</a></h4>

                            <p class="text-success text-uppercase m-b-20 font-13">{{ $profile->city }}</p>
                            <p class="text-muted font-13 text-justify">
                                {{ $profile->intro }}
                            </p>

                            <hr />

                            <ul class="list-inline">
                                <li>
                                    <p class="text-muted">Uurtarief</p>
                                    <h3 class="m-b-0">{{ $profile->hourly_rate }}</h3>
                                </li>
                                <li>
                                    <p class="text-muted">Beschikbaar</p>
                                    <h3 class="m-b-0">
                                        @if($profile->available == 1)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        @endif
                                    </h3>
                                </li>
                                <li>
                                    <p class="text-muted">Contact</p>
                                    <h3 class="m-b-0">
                                        <a href="{{ route('profile.show', [$profile->slug]) }}">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </a>
                                    </h3>
                                </li>
                            </ul>

                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
@endsection
