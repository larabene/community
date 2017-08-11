<!DOCTYPE html>
<html>
<head>
    <base href="{{ url('/') }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('_partials.html_head')

    <!-- App Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    @yield('styles')

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="assets/js/modernizr.min.js"></script>
</head>

<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="{{ url('/') }}" class="logo"><span>Lara<span>BeNe</span></span><i class="zmdi zmdi-layers"></i></a>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">

                <!-- Page title -->
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <button class="button-menu-mobile open-left">
                            <i class="zmdi zmdi-menu"></i>
                        </button>
                    </li>
                    <li>
                        @yield('page_heading')
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden-xs">
                        <form role="search" class="app-search">
                            <input type="text" placeholder="Bedrijven zoeken..."
                                   class="form-control">
                            <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>

            </div><!-- end container -->
        </div><!-- end navbar -->
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">

            @if(Auth::user())
            <div class="user-box">
                <div class="user-img">
                    <img src="https://pbs.twimg.com/profile_images/740925098031472640/AMJ7VVKV_400x400.jpg" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                </div>
                <h5><a href="{{ route('user.edit') }}">Joshua de Gier</a> </h5>
                @if(!is_null(Auth::user()->profile))
                <h6>{{ Auth::user()->profile->name }}</h6>
                @endif

                <ul class="list-inline">
                    <li>
                        <a href="{{ route('user.edit') }}" ><i class="zmdi zmdi-settings"></i></a>
                    </li>

                    <li>
                        <a href="{{ route('logout') }}" class="text-custom"><i class="zmdi zmdi-power"></i></a>
                    </li>
                </ul>
            </div>
            @endif

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul>
                    <li class="text-muted menu-title">Bedrijvengids</li>
                    <li>
                        <a href="{{ route('guide') }}" class="waves-effect"><i class="fa fa-address-card-o" aria-hidden="true"></i> <span> Kaarten </span> </a>
                    </li>
                    <li>
                        <a href="{{ route('guide.map') }}" class="waves-effect"><i class="fa fa-map-o" aria-hidden="true"></i> <span> Op de kaart </span> </a>
                    </li>
                    <li>
                        <a href="{{ route('guide.list') }}" class="waves-effect"><i class="fa fa-reorder" aria-hidden="true"></i> <span> Lijstweergave </span> </a>
                    </li>

                    <li class="text-muted menu-title">Slack</li>
                    <li>
                        <a href="https://larabene.signup.team" target="_blank" class="waves-effect"><i class="fa fa-slack" aria-hidden="true"></i> <span> Invite Page </span> </a>
                    </li>
                    <li>
                        <a href="https://larabene.slackarchive.io/general" target="_blank" class="waves-effect"><i class="fa fa-history" aria-hidden="true"></i> <span> SlackArchive.io </span></a>
                    </li>

                    <li class="text-muted menu-title">Gebruiker</li>
                    @if(Auth::user())
                        <li>
                            <a href="{{ route('profile.list') }}" class="waves-effect"><i class="fa fa-building-o" aria-hidden="true"></i> <span> Mijn bedrijven</span> </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="waves-effect"><i class="fa fa-sign-out" aria-hidden="true"></i> <span> Uitloggen</span> </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i> <span> Inloggen</span> </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="waves-effect"><i class="fa fa-user-o" aria-hidden="true"></i> <span> Aanmelden</span> </a>
                        </li>
                    @endif

                </ul>
                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>

        </div>

    </div>
    <!-- Left Sidebar End -->

    <div class="content-page">

        @yield('content')

        <footer class="footer">
            &copy; {{ date("Y") }} - larabene.com
        </footer>

    </div>

</div>
<!-- END wrapper -->


<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/pages/jquery.inbox.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
@yield('scripts')

</body>
</html>