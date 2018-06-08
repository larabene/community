@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">

                        @include('_partials.errors')
                        @include('flash::message')

                        <form class="form-horizontal" action="{{ route('slack_invites.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mailadres" required>
                                </div>
                            </div>

                            <hr />

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Uitnodiging versturen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
