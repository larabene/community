@extends('layouts.app')

@section('page_heading')
    <h4 class="page-title">{{ $user->name }} bewerken</h4>
@endsection

@section('content')
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">

                        @include('_partials.errors')

                        <form class="form-horizontal" method="post" action="{{ route('user.edit', [$user->slug]) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            @include('members.manage.form')

                            <hr />

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Bewerken</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection