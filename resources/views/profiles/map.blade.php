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
                        <div class="gmap">
                            {!! render_map($profiles) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Mapper::renderJavascript() !!}
    <script type="text/javascript">
        $(function(){
            $(window).bind("load resize", function(){
                _winHeight = $(window).height();

                // Setting Height
                $('.gmap').css({'height':_winHeight * 0.8});
            });
        });
    </script>
@endsection

@section('styles')
    <style type="text/css">
        .gmap {
            width: 100%;
            height: 500px;
        }
    </style>
@endsection
