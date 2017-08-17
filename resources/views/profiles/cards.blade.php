@extends('layouts.app')

@section('page_heading')
    <h4 class="page-title">Adresboek</h4>
@endsection

@section('content')
        <div class="content">
            <div class="container">

                @include('flash::message')

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
                        <div class="card-box project-box {{ $profile->highlight == 1 ? 'highlight' : 'regular' }}" onclick="javascript:window.location='{{ route('profile.show', [$profile->slug]) }}'">
                            @if($profile->highlight == 1)
                            <div class="label label-danger"><i class="fa fa-star" aria-hidden="true"></i> uitgelicht</div>
                            @endif

                            <h4 class="m-t-0 m-b-5">
                                @if(Auth::check() && Auth::user()->profiles->contains($profile))
                                    <a href="{{ route('profile.edit', $profile->slug) }}" class="btn btn-icon waves-effect waves-light btn-primary btn-xs"> <i class="fa fa-pencil"></i> </a>
                                @endif
                                <a href="{{ route('profile.show', [$profile->slug]) }}" class="text-inverse">{{ $profile->name }}</a>
                            </h4>

                            <p class="text-success text-uppercase m-b-20 font-13">{{ $profile->city }}</p>
                            <p class="text-muted font-13 text-justify eqHeight">
                                {{ $profile->intro }}
                            </p>

                            <hr />

                            <ul class="list-inline">
                                <li>
                                    <p class="text-muted">Uurtarief</p>
                                    <h3 class="m-b-0">{{ $profile->hourly_rate == 0 ? 'p.o.a.' : $profile->hourly_rate }}</h3>
                                </li>
                                <li>
                                    <p class="text-muted">Beschikbaar</p>
                                    <h3 class="m-b-0">
                                        @if($profile->available == 1)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        @endif
                                    </h3>
                                </li>
                            </ul>

                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach

                {!! $profiles->render() !!}
            </div>
        </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="/assets/pages/jquery.equalHeights.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.eqHeight').equalHeights();
        });
    </script>
@endsection
