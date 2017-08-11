@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">

            @include('flash::message')

            <div class="row">
                <div class="col-sm-4">
                    <button type="button" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-20">
                        Bedrijf toevoegen
                    </button>
                </div>
                <div class="col-sm-8">
                    <div class="project-sort pull-right">
                        <div class="project-sort-item">
                            <i class="fa fa-th-large" aria-hidden="true" style="font-size: 2em;"></i>
                            <i class="fa fa-th-list" aria-hidden="true" style="font-size: 2em;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th><i class="fa fa-star-o" aria-hidden="true"></i></th>
                            <th>Bedrijfsnaam</th>
                            <th>Plaats</th>
                            <th>Telefoon</th>
                            <th>Uurtarief</th>
                            <th>Beschikbaar</th>
                            <th>Contact</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($profiles as $profile)
                        <tr>
                            <th scope="row">
                                @if($profile->highlight == 1)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                @endif
                            </th>
                            <td>{{ $profile->name }}</td>
                            <td>{{ $profile->city }} {{ $profile->country }}</td>
                            <td>{{ $profile->telephone }}</td>
                            <td>&euro; {{ $profile->hourly_rate }}</td>
                            <td>
                                @if($profile->available == 1)
                                <i class="fa fa-check" aria-hidden="true"></i>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('profile.show', $profile->slug) }}">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                Edit knoppie
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
@endsection
