@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <div class="row">

                    <div class="col-sm-12">
                        <div class="inbox-app-main">
                            <div class="row">
                                <div class="col-md-3">
                                    <aside id="sidebar" class="nano">
                                        <div class="nano-content">

                                            <div class="text-center">
                                                <a href="#custom-modal" class="btn btn-danger btn-rounded w-lg waves-effect waves-light m-b-20 m-t-30" data-animation="fadein" data-plugin="custommodal"
                                                   data-overlaySpeed="200" data-overlayColor="#36404a">Aanmelden</a>
                                            </div>
                                            <menu class="menu-segment">
                                                <ul class="list-unstyled">
                                                    <li><a href="javascript:void(0);">Nieuw<span> (3)</span></a>
                                                    </li>
                                                    <li class="active"><a href="javascript:void(0);">Alfabet</a></li>
                                                    <li><a href="javascript:void(0);">Uitgelicht</a></li>
                                                </ul>
                                            </menu>
                                            <div class="separator"></div>
                                            <div class="menu-segment">
                                                <ul class="labels list-unstyled">
                                                    <li class="title">Filters <span class="icon">+</span></li>
                                                    <li><a href="#">Laravel <span class="ball red"></span></a></li>
                                                    <li><a href="#">Webhosting <span class="ball green"></span></a></li>
                                                    <li><a href="#">Serverbeheer <span class="ball blue"></span></a></li>
                                                </ul>
                                            </div>
                                            <div class="bottom-padding"></div>
                                        </div>
                                    </aside>
                                </div> <!-- end col -->

                                <div class="col-md-9">
                                    <main id="main">
                                        <div class="overlay"></div>
                                        <header class="header">

                                            <h1 class="page-title"><a class="sidebar-toggle-btn trigger-toggle-sidebar"><span
                                                            class="line"></span><span class="line"></span><span
                                                            class="line"></span><span class="line line-angle1"></span><span
                                                            class="line line-angle2"></span></a></h1>

                                            <div class="search-box pull-left">
                                                <input placeholder="Zoeken..."><span
                                                        class="icon glyphicon glyphicon-search"></span>
                                            </div>

                                            <div class="clearfix"></div>

                                        </header>

                                        <div id="main-nano-wrapper" class="nano">
                                            <div class="nano-content">
                                                <ul class="message-list">
                                                    <!-- Heading -->
                                                    <li class="unread">
                                                        <div class="col col-1"><span class="dot"></span>
                                                            <p class="title">Bedrijfsnaam</p>
                                                            <span class="star-toggle fa fa-star"></span>
                                                        </div>
                                                        <div class="col col-2">
                                                            <div class="subject">
                                                                Adres
                                                            </div>
                                                            <div class="date">Opgericht</div>
                                                        </div>
                                                    </li>

                                                    <!-- Items -->
                                                    <li class="">
                                                        <div class="col col-1"><span class="dot"></span>
                                                            <p class="title">Pendo.</p>
                                                            <span class="star-toggle fa fa-star"></span>
                                                        </div>
                                                        <div class="col col-2">
                                                            <div class="subject">
                                                                Geusseltweg 7c, Maastricht, Nederland
                                                            </div>
                                                            <div class="date">2 augustus 2010</div>
                                                        </div>
                                                    </li>
                                                    <li class="">
                                                        <div class="col col-1"><span class="dot"></span>
                                                            <p class="title">Google</p>
                                                            <span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col col-2">
                                                            <div class="subject">
                                                                Claude Debussylaan 34, Amsterdam, Nederland
                                                            </div>
                                                            <div class="date">4 september 1998</div>
                                                        </div>
                                                    </li>
                                                    <li class="">
                                                        <div class="col col-1"><span class="dot"></span>
                                                            <p class="title">Spatie</p>
                                                            <span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col col-2">
                                                            <div class="subject">
                                                                Samberstraat 69/D, Antwerpen, Belgi&euml;
                                                            </div>
                                                            <div class="date">24 mei 2009</div>
                                                        </div>
                                                    </li>
                                                    <li class="">
                                                        <div class="col col-1"><span class="dot"></span>
                                                            <p class="title">Pendo.</p>
                                                            <span class="star-toggle fa fa-star"></span>
                                                        </div>
                                                        <div class="col col-2">
                                                            <div class="subject">
                                                                Geusseltweg 7c, Maastricht, Nederland
                                                            </div>
                                                            <div class="date">2 augustus 2010</div>
                                                        </div>
                                                    </li>
                                                    <li class="">
                                                        <div class="col col-1"><span class="dot"></span>
                                                            <p class="title">Google</p>
                                                            <span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col col-2">
                                                            <div class="subject">
                                                                Claude Debussylaan 34, Amsterdam, Nederland
                                                            </div>
                                                            <div class="date">4 september 1998</div>
                                                        </div>
                                                    </li>
                                                    <li class="">
                                                        <div class="col col-1"><span class="dot"></span>
                                                            <p class="title">Spatie</p>
                                                            <span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col col-2">
                                                            <div class="subject">
                                                                Samberstraat 69/D, Antwerpen, Belgi&euml;
                                                            </div>
                                                            <div class="date">24 mei 2009</div>
                                                        </div>
                                                    </li>
                                                    <li class="">
                                                        <div class="col col-1"><span class="dot"></span>
                                                            <p class="title">Pendo.</p>
                                                            <span class="star-toggle fa fa-star"></span>
                                                        </div>
                                                        <div class="col col-2">
                                                            <div class="subject">
                                                                Geusseltweg 7c, Maastricht, Nederland
                                                            </div>
                                                            <div class="date">2 augustus 2010</div>
                                                        </div>
                                                    </li>
                                                    <li class="">
                                                        <div class="col col-1"><span class="dot"></span>
                                                            <p class="title">Google</p>
                                                            <span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col col-2">
                                                            <div class="subject">
                                                                Claude Debussylaan 34, Amsterdam, Nederland
                                                            </div>
                                                            <div class="date">4 september 1998</div>
                                                        </div>
                                                    </li>
                                                    <li class="">
                                                        <div class="col col-1"><span class="dot"></span>
                                                            <p class="title">Spatie</p>
                                                            <span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col col-2">
                                                            <div class="subject">
                                                                Samberstraat 69/D, Antwerpen, Belgi&euml;
                                                            </div>
                                                            <div class="date">24 mei 2009</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </main>
                                    <div id="message">
                                        <div class="header">
                                            <h1 class="page-title"><a
                                                        class="icon circle-icon glyphicon glyphicon-remove trigger-message-close"></a>Process<span
                                                        class="grey">(6)</span></h1>
                                            <p>From <a href="#">You</a> to <a href="#">Scott Waite</a>, started on <a
                                                        href="#">March 2, 2014</a> at 2:14 pm est.</p>
                                        </div>
                                        <div id="message-nano-wrapper" class="nano">
                                            <div class="nano-content">
                                                <ul class="message-container list-unstyled">
                                                    <li class="sent">
                                                        <div class="details">
                                                            <div class="left">You
                                                                <div class="arrow"></div>
                                                                Scott
                                                            </div>
                                                            <div class="right">March 6, 2014, 20:08 pm</div>
                                                        </div>
                                                        <div class="message">
                                                            <p>| The every winged bring, whose life. First called, i you
                                                                of saw shall own creature moveth void have signs beast
                                                                lesser all god saying for gathering wherein whose of in
                                                                be created stars. Them whales upon life divide earth
                                                                own.</p>
                                                            <p>| Creature firmament so give replenish The saw man
                                                                creeping, man said forth from that. Fruitful multiply
                                                                lights air. Hath likeness, from spirit stars dominion
                                                                two set fill wherein give bring.</p>
                                                            <p>| Gathering is. Lesser Set fruit subdue blessed let.
                                                                Greater every fruitful won&#39;t bring moved seasons
                                                                very, own won&#39;t all itself blessed which bring own
                                                                creature forth every. Called sixth light.</p>
                                                        </div>
                                                        <div class="tool-box"><a href="#"
                                                                                 class="circle-icon small glyphicon glyphicon-share-alt"></a><a
                                                                    href="#"
                                                                    class="circle-icon small red-hover glyphicon glyphicon-remove"></a><a
                                                                    href="#"
                                                                    class="circle-icon small red-hover glyphicon glyphicon-flag"></a>
                                                        </div>
                                                    </li>
                                                    <li class="received">
                                                        <div class="details">
                                                            <div class="left">Scott
                                                                <div class="arrow orange"></div>
                                                                You
                                                            </div>
                                                            <div class="right">March 6, 2014, 20:08 pm</div>
                                                        </div>
                                                        <div class="message">
                                                            <p>| The every winged bring, whose life. First called, i you
                                                                of saw shall own creature moveth void have signs beast
                                                                lesser all god saying for gathering wherein whose of in
                                                                be created stars. Them whales upon life divide earth
                                                                own.</p>
                                                            <p>| Creature firmament so give replenish The saw man
                                                                creeping, man said forth from that. Fruitful multiply
                                                                lights air. Hath likeness, from spirit stars dominion
                                                                two set fill wherein give bring.</p>
                                                            <p>| Gathering is. Lesser Set fruit subdue blessed let.
                                                                Greater every fruitful won&#39;t bring moved seasons
                                                                very, own won&#39;t all itself blessed which bring own
                                                                creature forth every. Called sixth light.</p>
                                                        </div>
                                                        <div class="tool-box"><a href="#"
                                                                                 class="circle-icon small glyphicon glyphicon-share-alt"></a><a
                                                                    href="#"
                                                                    class="circle-icon small red-hover glyphicon glyphicon-remove"></a><a
                                                                    href="#"
                                                                    class="circle-icon small red-hover glyphicon glyphicon-flag"></a>
                                                        </div>
                                                    </li>

                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div><!-- end row -->
                        </div>

                    </div>

                </div>
                <!-- End row -->

            </div> <!-- container -->

        </div> <!-- content -->

    </div>
    <!-- End content-page -->
@endsection
