@extends('layouts.app')

@section('page_heading')
    @if(Route::currentRouteName() == "profile.list")
        <h4 class="page-title">Mijn bedrijven</h4>
    @else
        <h4 class="page-title">Bedrijvengids</h4>
    @endif
@endsection

@section('content')
    <div class="content">
        <div class="container">

            @include('flash::message')

            <div class="row">
                <div class="col-sm-4">
                    <a href="{{ route('profile.create') }}" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-20">
                        Bedrijf toevoegen
                    </a>
                </div>
                <div class="col-sm-8">
                    <div class="project-sort pull-right">
                        <div class="project-sort-item">
                            <!-- Nothing so far -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <table id="datatable" class="table table-striped">
                            <thead>
                            <tr>
                                <th><i class="fa fa-star-o" aria-hidden="true"></i></th>
                                <th>Bedrijfsnaam</th>
                                <th>Plaats</th>
                                <th>Telefoon</th>
                                <th>Uurtarief</th>
                                <th>Beschikbaar</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($profiles as $profile)
                            <tr class="{{ $profile->highlight == 1 ? 'danger' : '' }}">
                                <th scope="row">
                                    @if($profile->highlight == 1)
                                    <span class="red"><i class="fa fa-star" aria-hidden="true"></i></span>
                                    @endif
                                </th>
                                <td>
                                    <a href="{{ route('profile.show', $profile->slug) }}">{{ $profile->name }}</a>
                                </td>
                                <td>{{ $profile->city }} {{ $profile->country }}</td>
                                <td>{{ $profile->telephone }}</td>
                                <td>&euro; {{ $profile->hourly_rate == 0 ? 'p.o.a.' : $profile->hourly_rate }}</td>
                                <td>
                                    @if($profile->available == 1)
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>
                                    @if(Auth::check() && Auth::user()->profiles->contains($profile))
                                        <a href="{{ route('profile.edit', $profile->slug) }}" class="btn btn-icon waves-effect waves-light btn-primary btn-xs"> <i class="fa fa-pencil"></i> </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('styles')
    <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <!-- Datatables-->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
    <script src="assets/plugins/datatables/jszip.min.js"></script>
    <script src="assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>
    <script src="assets/pages/datatables.init.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable({
                "paging":   false,
                "ordering": true,
                "order": [[ 1, "asc" ]],
                "info":     false
            });
        });
    </script>
@endsection