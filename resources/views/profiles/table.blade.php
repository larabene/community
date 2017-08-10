@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">

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
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row"><i class="fa fa-star" aria-hidden="true"></i></th>
                            <td>Pendo</td>
                            <td>Maastricht, Nederland</td>
                            <td>043 - 302 00 01</td>
                            <td>&euro; 65</td>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <td><i class="fa fa-envelope" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>Spatie</td>
                            <td>Antwerpen, Belgi&euml;</td>
                            <td>+32 (0)82 743 92 73</td>
                            <td>&euro; 80</td>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <td><i class="fa fa-envelope" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>Google</td>
                            <td>Amsterdam, Nederland</td>
                            <td>010 - 927 28 39</td>
                            <td>&euro; 175</td>
                            <td><i class="fa fa-times" aria-hidden="true"></i></td>
                            <td><i class="fa fa-envelope" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th scope="row"><i class="fa fa-star" aria-hidden="true"></i></th>
                            <td>Roj BV</td>
                            <td>Berlijn, Duitsland</td>
                            <td>0180 - 937 83 182</td>
                            <td>&euro; 50</td>
                            <td><i class="fa fa-times" aria-hidden="true"></i></td>
                            <td><i class="fa fa-envelope" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>Microsoft</td>
                            <td>Rotterdam, Nederland</td>
                            <td>030 - 123 45 67</td>
                            <td>&euro; 62,50</td>
                            <td><i class="fa fa-times" aria-hidden="true"></i></td>
                            <td><i class="fa fa-envelope" aria-hidden="true"></i></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
@endsection
