@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-8">
                    <div class="bg-picture card-box">
                        <div class="profile-info-name">

                            @if(!is_null($profile->logo))
                            <img src="{{ asset('uploads/logos/' . $profile->logo) }}" class="img-thumbnail" alt="{{ $profile->name }}">
                            @endif

                            <div class="profile-info-detail">
                                <h3 class="m-t-0 m-b-0">
                                    @if(Auth::check() && Auth::user()->profiles->contains($profile))
                                        <a href="{{ route('profile.edit', $profile->slug) }}" class="btn btn-icon waves-effect waves-light btn-primary btn-xs"> <i class="fa fa-pencil"></i> </a>
                                    @endif
                                    {{ $profile->name }}
                                </h3>
                                <p class="text-muted m-b-20"><i>{{ $profile->city }}, {{ $profile->country }}</i></p>
                                @markdown($profile->about)

                                <div class="button-list m-t-20">
                                    @if(!is_null($profile->facebook))
                                        <a href="{{ $profile->facebook }}" class="btn btn-facebook btn-sm waves-effect waves-light">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    @endif

                                    @if(!is_null($profile->twitter))
                                        <a href="{{ $profile->twitter }}" class="btn btn-twitter btn-sm waves-effect waves-light">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    @endif

                                    @if(!is_null($profile->linkedin))
                                        <a href="{{ $profile->linkedin }}" class="btn btn-linkedin btn-sm waves-effect waves-light">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    @endif

                                    @if(!is_null($profile->googleplus))
                                        <a href="{{ $profile->googleplus }}" class="btn btn-googleplus btn-sm waves-effect waves-light">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    @endif

                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!--/ meta -->
                </div>

                <div class="col-sm-4">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Adres</h4>

                        <div class="text-left">
                            @if(!is_null($profile->address))
                                <p class="text-muted font-13"><strong>Adres :</strong> <span class="m-l-15">{{ $profile->address }}</span></p>
                            @endif
                            @if(!is_null($profile->zipcode) || !is_null($profile->city))
                                <p class="text-muted font-13"><strong>Postcode :</strong> <span class="m-l-15">{{ $profile->zipcode or '' }} {{ $profile->city or '' }}</span></p>
                            @endif
                            @if(!is_null($profile->country))
                                <p class="text-muted font-13"><strong>Land :</strong> <span class="m-l-15">{{ $profile->country }}</span></p>
                            @endif
                        </div>

                    </div>

                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Contact</h4>

                        <div class="text-left">
                            @if(!is_null($profile->website))
                                <p class="text-muted font-13"><strong>Website :</strong> <span class="m-l-15"><a target="_blank" href="{{ $profile->website }}">{{ $profile->website }}</a></span></p>
                            @endif
                            @if(!is_null($profile->telephone))
                                <p class="text-muted font-13"><strong>Telefoon :</strong> <span class="m-l-15">{{ $profile->telephone }}</span></p>
                            @endif
                            @if(!is_null($profile->mobile))
                                <p class="text-muted font-13"><strong>Mobiel :</strong> <span class="m-l-15">{{ $profile->mobile }}</span></p>
                            @endif
                            @if(!is_null($profile->whatsapp))
                                <p class="text-muted font-13"><strong>Whatsapp :</strong> <span class="m-l-15">{{ $profile->whatsapp }}</span></p>
                            @endif
                            @if(!is_null($profile->company_number))
                                <p class="text-muted font-13"><strong>KvK nummer :</strong> <span class="m-l-15">{{ $profile->company_number }}</span></p>
                            @endif
                            @if(!is_null($profile->vat_number))
                                <p class="text-muted font-13"><strong>BTW nummer :</strong> <span class="m-l-15">{{ $profile->vat_number }}</span></p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection