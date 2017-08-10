@extends('layouts.auth')

@section('content')
    <div class="m-t-40 card-box">
        <div class="text-center">
            <h4 class="text-uppercase font-bold m-b-0">Wachtwoord herstellen</h4>
        </div>
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-horizontal m-t-20" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="E-mailadres" required autofocus>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Wachtwoord" required>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Herhaal wachtwoord" required>
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">
                            Herstel wachtwoord
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>
    <!-- end card-box -->

    <div class="row">
        <div class="col-sm-12 text-center">
            <p class="text-muted"><a href="{{ route('login') }}" class="text-primary m-l-5"><b>Inloggen</b></a> - <a href="{{ route('register') }}" class="text-primary m-l-5"><b>Registreren</b></a></p>
        </div>
    </div>
@endsection
