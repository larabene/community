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
                        <div class="gmap">
                            {{ createGoogleMap($profiles) }}
                            {!! Mapper::render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Mapper::renderJavascript() !!}
@endsection

@section('styles')
<style type="text/css">
    .gmap {
        width: 100%;
        height: 500px;
    }
</style>
@endsection