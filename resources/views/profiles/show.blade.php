@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-8">
                    <div class="bg-picture card-box">
                        <div class="profile-info-name">

                            @if(!is_null($profile->logo))
                            <img src="{{ asset('uploads/logos/' . $profile->logo) }}" class="img-thumbnail" alt="{{ $profile->name }}">
                            @endif

                            <div class="profile-info-detail">
                                <h3 class="m-t-0 m-b-0">{{ $profile->name }}</h3>
                                <p class="text-muted m-b-20"><i>{{ $profile->city }}, {{ $profile->country }}</i></p>
                                @markdown($profile->about)

                                <div class="button-list m-t-20">
                                    <button type="button" class="btn btn-facebook btn-sm waves-effect waves-light">
                                        <i class="fa fa-facebook"></i>
                                    </button>

                                    <button type="button" class="btn btn-sm btn-twitter waves-effect waves-light">
                                        <i class="fa fa-twitter"></i>
                                    </button>

                                    <button type="button" class="btn btn-sm btn-linkedin waves-effect waves-light">
                                        <i class="fa fa-linkedin"></i>
                                    </button>

                                    <button type="button" class="btn btn-sm btn-dribbble waves-effect waves-light">
                                        <i class="fa fa-dribbble"></i>
                                    </button>

                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!--/ meta -->
                </div>

                <div class="col-sm-4">
                    <div class="card-box">
                        <div class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>

                        <h4 class="header-title m-t-0 m-b-30">My Team Members</h4>

                        <ul class="list-group m-b-0 user-list">
                            <li class="list-group-item">
                                <a href="#" class="user-list-item">
                                    <div class="avatar">
                                        <img src="assets/images/users/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="user-desc">
                                        <span class="name">Michael Zenaty</span>
                                        <span class="desc">CEO</span>
                                    </div>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#" class="user-list-item">
                                    <div class="avatar">
                                        <img src="assets/images/users/avatar-3.jpg" alt="">
                                    </div>
                                    <div class="user-desc">
                                        <span class="name">James Neon</span>
                                        <span class="desc">Web Designer</span>
                                    </div>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#" class="user-list-item">
                                    <div class="avatar">
                                        <img src="assets/images/users/avatar-5.jpg" alt="">
                                    </div>
                                    <div class="user-desc">
                                        <span class="name">John Smith</span>
                                        <span class="desc m-b-0">Web Developer</span>
                                    </div>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#" class="user-list-item">
                                    <div class="avatar">
                                        <img src="assets/images/users/avatar-6.jpg" alt="">
                                    </div>
                                    <div class="user-desc">
                                        <span class="name">Michael Zenaty</span>
                                        <span class="desc">Programmer</span>
                                    </div>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#" class="user-list-item">
                                    <div class="avatar">
                                        <img src="assets/images/users/avatar-1.jpg" alt="">
                                    </div>
                                    <div class="user-desc">
                                        <span class="name">Mat Helme</span>
                                        <span class="desc">Manager</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection