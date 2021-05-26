<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'OffBeat Stays') }}</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link type="text/css" rel="stylesheet" href="{{ asset('front-assets/css/reset.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('front-assets/css/plugins.css') }}">
        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" />
        <link type="text/css" rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('front-assets/css/color.css') }}">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="{{ asset('front-assets/images/favicon.ico') }}">

        @livewireStyles
    </head>
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="pin">
                <div class="pulse"></div>
            </div>
        </div>
        <!--loader end-->
        <!-- Main  -->
        <div id="main">
            <!-- header-->
            @livewire('front.common.front-common-header-component')
            <!--  header end -->
            <!--  wrapper  -->
            <div id="wrapper">
                <!-- content-->
                <div class="content">
                	{{-- Route  = {{ Route::current()->getName() }} --}}
                	@yield('content')
                    {{$slot}}
                </div>
                <!-- content end-->
                <div class="limit-box fl-wrap"></div>
            </div>
            <!--wrapper end -->
            <!--footer -->
            @livewire('front.common.front-common-footer-component')
            
            <!--footer end -->
            <!--map-modal -->
            <div class="map-modal-wrap">
                <div class="map-modal-wrap-overlay"></div>
                <div class="map-modal-item">
                    <div class="map-modal-container fl-wrap">
                        <div class="map-modal fl-wrap">
                            <div id="singleMap" data-latitude="40.7" data-longitude="-73.1"></div>
                        </div>
                        <h3><i class="fal fa-location-arrow"></i><a href="#">Hotel Title</a></h3>
                        <input id="pac-input" class="controls fl-wrap controls-mapwn" type="text" placeholder="What Nearby ?   Bar , Gym , Restaurant ">
                        <div class="map-modal-close"><i class="fal fa-times"></i></div>
                    </div>
                </div>
            </div>
            <!--map-modal end -->           
            <!--register form -->
            <div class="main-register-wrap modal">
                <div class="reg-overlay"></div>
                <div class="main-register-holder">
                    <div class="main-register fl-wrap">
                        <div class="close-reg color-bg"><i class="fal fa-times"></i></div>
                        <ul class="tabs-menu">
                            <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> Login</a></li>
                            <li><a href="#tab-2"><i class="fal fa-user-plus"></i> Register</a></li>
                        </ul>
                        <!--tabs -->                       
                        <div id="tabs-container">
                            <div class="tab">
                                <!--tab -->
                                <div id="tab-1" class="tab-content">
                                    <h3>Sign In <span>Easy<strong>Book</strong></span></h3>
                                    <div class="custom-form">
                                        <form method="post"  name="registerform">
                                            <label>Username or Email Address <span>*</span> </label>
                                            <input name="email" type="text"   onClick="this.select()" value="">
                                            <label >Password <span>*</span> </label>
                                            <input name="password" type="password"   onClick="this.select()" value="" >
                                            <button type="submit"  class="log-submit-btn"><span>Log In</span></button>
                                            <div class="clearfix"></div>
                                            <div class="filter-tags">
                                                <input id="check-a" type="checkbox" name="check">
                                                <label for="check-a">Remember me</label>
                                            </div>
                                        </form>
                                        <div class="lost_password">
                                            <a href="#">Lost Your Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <!--tab end -->
                                <!--tab -->
                                <div class="tab">
                                    <div id="tab-2" class="tab-content">
                                        <h3>Sign Up <span>Easy<strong>Book</strong></span></h3>
                                        <div class="custom-form">
                                            <form method="post"   name="registerform" class="main-register-form" id="main-register-form2">
                                                <label >Full Name <span>*</span> </label>
                                                <input name="name" type="text"   onClick="this.select()" value="">
                                                <label>Email Address <span>*</span></label>
                                                <input name="email" type="text"  onClick="this.select()" value="">
                                                <label >Password <span>*</span></label>
                                                <input name="password" type="password"   onClick="this.select()" value="" >
                                                <button type="submit"     class="log-submit-btn"  ><span>Register</span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--tab end -->
                            </div>
                            <!--tabs end -->
                            <div class="log-separator fl-wrap"><span>or</span></div>
                            <div class="soc-log fl-wrap">
                                <p>For faster login or register use your social account.</p>
                                <a href="#" class="facebook-log"><i class="fab fa-facebook-f"></i>Connect with Facebook</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--register form end -->
            <a class="to-top"><i class="fas fa-caret-up"></i></a>
            {{-- @yield('modal') --}}
            @stack('sidepopup')
            <!--ajax-modal-container-->
    <div class="ajax-modal-overlay" style=""></div>
    <div class="ajax-modal-container" style="">
        <!--ajax-modal -->
        
    </div>
            <div class="modalkabaap" style="position:fixed; z-index: 9999; display:none"></div>
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="{{ asset('front-assets/js/jquery.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script type="text/javascript" src="{{ asset('front-assets/js/plugins.js') }}"></script>
        <script type="text/javascript" src="{{ asset('front-assets/js/scripts.js') }}"></script>

        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOURAPIKEYHERE&libraries=places&callback=initAutocomplete"></script>  --}}
        {{-- <script type="text/javascript" src="{{ asset('front-assets/js/map-single.js') }}"></script>          --}}
        @livewireScripts
        @stack('scripts')
    </body>
</html>