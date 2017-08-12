@extends('layouts.app')

@section('page_heading')
    <h4 class="page-title">Op de kaart</h4>
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Markers</h4>
                        <div id="gmaps-markers" class="gmaps"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <markers>
        @foreach($profiles as $profile)
            @if(!is_null($profile->coordinates_lat) && !is_null($profile->coordinates_lng))
                <marker class="marker" data-lat="{{ $profile->coordinates_lat }}" data-lng="{{ $profile->coordinates_lng }}" data-name="{{ $profile->name }}" data-url="{{ route('profile.show', [$profile->slug]) }}"></marker>
            @endif
        @endforeach
    </markers>
@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOxgetlp8OD4W9QqhsENvcaCxyosdasnA"></script>
    <script src="assets/plugins/gmaps/gmaps.min.js"></script>
    <script src="assets/pages/jquery.gmaps.js"></script>
@endsection