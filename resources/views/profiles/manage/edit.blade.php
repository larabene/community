@extends('layouts.app')

@section('page_heading')
    <h4 class="page-title">{{ $profile->name }} bewerken</h4>
@endsection

@section('content')
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">

                        @include('_partials.errors')

                        <form class="form-horizontal" method="post" action="{{ route('profile.edit', [$profile->slug]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            @include('profiles.manage.form')

                            <hr />

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Bewerken</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link href="assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <script src="assets/plugins/fileuploads/js/dropify.min.js"></script>
    <script type="text/javascript">
        $('.dropify').dropify({
            messages: {
                'default': 'Sleep of klik om up te loaden',
                'replace': 'Sleep of klik om te vervangen',
                'remove': 'Verwijder',
                'error': 'Oops, iets ging mis'
            }
        });
    </script>
@endsection