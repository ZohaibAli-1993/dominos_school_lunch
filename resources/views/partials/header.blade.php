<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="favicon.png" type="image/gif" />
    <link rel="stylesheet" type="text/css" href="/css/app.css" />
    <script>window.Laravel = {csrfToken: '{{csrf_token()}}'}</script>
    <script src="/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/custom.css" />
    <script src="/js/custom.js"></script>


    @yield('links_events')

    <title>Dominos Lunch Management System</title>
</head>

<body onresize="OnWindowResized()">

    <!-- Main container of the header -->
    <header id="container">

        <!-- Top portion of header -->
        <div id="top_header">

            <!-- Logo of the site -->
            <img id="logo" src="/img/logo.png" alt="logo" />

            <!-- Header icons-->
            <div id="header_icons">
                @if (Route::has('login'))
                <p class="user_icon">
                    @auth
                    <a href="{{ url('/logout') }}">Logout</a>
                    @else

                    <a href="{{ url('/login') }}"><i class="far fa-user"></i></a>
                    <!--<a  href="" data-toggle="modal" data-target="#exampleModalCenter"><i class="far fa-user"></i></a>-->

                  @endauth 
                </p>
                
                @endif
                

                <p class=" contact_icon">

                            <a href="/contact"><i class="fas fa-envelope"></i></a>

                </p>

            </div>
            <!--/header_icons-->

        </div>
        <!--/top header -->

        <!-- Bottom portion of the header -->
        <div id="{{ ((Request::path() == '/') ||
                     (Request::path() == 'home')) ? 'home_header' : 'not_home' }}">
            <div id="bottom_header">

                <!-- Brand name -->
                <div id="brand_name">

                    <div class="name_first_part">

                        <p>Domino's</p>

                    </div>
                    <!--/first_part-->

                    <div class="name_second_part">

                        <p>School Lunch</p>

                    </div>
                    <!--/second_part-->

                </div>
                <!--/brand_name-->

                <!-- Main Navigation -->
                <div id="main_nav_bar">
                    @if(!auth()->check())
                    <nav id=main_nav>

                        <ul id="menu_list">

                            <li><a href="/">Home</a></li>

                            <li><a href="/schools_help">School Coordinator</a></li>

                            <li><a href="/parents_help">Parents</a></li>

                            <li><a href="/about">About Us</a></li>

                            <li><a href="/registration" class="button red" id="nav_cta">Sign Up</a></li>
                        </ul>
                    </nav><!--/nav-->
                    @endif
                
                    @if(auth()->check())
                        @if(auth()->user()->type == 'school')
                            <nav id="school_nav">
                                <ul>
                                    <li><a href="/schools/classrooms">Classrooms</a></li>
                                    <li><a href="/schools/events">Events</a></li>
                                    <li><a href="/schools/reports">Reports</a></li>
                                    <li><a href="/schools/profile">Profile</a></li>
                                    <li><a href="/schools_help">Help</a></li>
                                </ul>
                            </nav>
                        @endif

                        @if(auth()->user()->type == 'parents')
                            <nav id="parents_nav">
                                <ul>
                                    <li><a href="/parents/order">Order New Lunch</a></li>
                                    <li><a 
                                        href="/parents/">
                                        Add Student</a></li>
                                    <li><a 
                                        href="/parents/edit">
                                        Profile</a></li>
                                    <li><a href="/parents_help">Help</a></li>
                                </ul>
                            </nav>

                        @endif

                        @if(auth()->user()->type == 'admin')
                            <nav id="admin_nav">
                                <ul>
                                    <li><a href="/dominos/setup">Admin</a></li>
                                </ul>
                            </nav>

                        @endif
                    @endif
                    <p class="menu_icon" onclick="openMenu()"><i class="fas fa-bars"></i></p>

                </div>

                <div class="hero">
                    @if(request()->route()->getName() == 'home')
                    <div class="cta">
                        <h1>With Domino</h1>
                        <h2>School Lunch is easier than ever</h2>
                        <a class="button" href="/registration">Lunch Order</a>
                    </div>
                    @endif
                </div>
            </div> <!-- /bottom header -->
        </div><!-- /home_header-->


    </header>
    <!--/header-->

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div id="loginformContent">
                        <!-- Tabs Titles -->

                        <!-- Icon -->
                        <div class="fadeIn first">
                            <!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
                            <h2 class="my-5">{{ __('Login') }}</h2>
                        </div>

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div id="formFooter">
                                <a class="underlineHover" href="#">Forgot Password?</a>
                            </div>
                            <input type="submit" class="fadeIn fourth zero-raduis" value="login">
                            <p>You don't have a account ?</p>
                            <a href="/registration">
                                <input type="button" class="fadeIn fourth zero-raduis pc close" value="register">
                            </a>
                        </form>


                    </div>
                </div>


            </div>
        </div>

    </div>
    <div class="modal fade" id="exampleModalRegister" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>fadeI
                </div>
                <h2> Registration</h2>
                <div class="modal-body" style="padding:45px">
                    <a href="/parents_registration">
                        <img src="/img/parents.jpg" alt="HTML tutorial" style="width:150px;height:150px;border:0; ">
                    </a>
                    <a href="/school_registration">
                        <img src="/img/school.jpg" alt="HTML tutorial" style="width:150px;height:150px;border:0; ">
                    </a>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>



    <div class="{{ (Request::path() == '/') ? 'home' : ''}}" id="main_content">