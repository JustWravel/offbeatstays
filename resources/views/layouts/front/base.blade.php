<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('meta_title', config('app.name', 'OffBeat Stays'))</title>
        <link rel='dns-prefetch' href='//cdn.jsdelivr.net' />
        <link rel='dns-prefetch' href='//kit-pro.fontawesome.com' />
        <link rel='dns-prefetch' href='//fonts.googleapis.com' />
        {{-- <link rel='dns-prefetch' href='//s.w.org' /> --}}
        {{-- <link rel='dns-prefetch' href='//c0.wp.com' /> --}}
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin />
        {{-- <link rel="alternate" type="application/rss+xml" title="Offbeat Stays in India - OffBeat Stays &raquo; Feed" href="https://offbeatstays.in/wp/feed/" />
        <link rel="alternate" type="application/rss+xml" title="Offbeat Stays in India - OffBeat Stays &raquo; Comments Feed" href="https://offbeatstays.in/wp/comments/feed/" />
         --}}
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content="@yield('meta_keywords')"/>
        <meta name="description" content="@yield('meta_description')"/>

        <meta property="og:title" content="@yield('meta_title')"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="{{url()->current()}}"/>
        <meta property="og:site_name" content="OffBeat Stays"/>
        <meta property="og:image" content="{{asset('/front-assets/images/logo.png')}}"/>
    
        <!--=============== css  ===============-->
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
        {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link type="text/css" rel="stylesheet" href="{{ asset('front-assets/css/reset.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('front-assets/css/plugins.css') }}">
        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" />
        <link type="text/css" rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('front-assets/css/color.css') }}"> --}}
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="{{ asset('front-assets/images/favicon.ico') }}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link type="text/css" rel="stylesheet" href="{{ mix('front-assets/css/reset.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ mix('front-assets/css/plugins.css') }}">
        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" />
        <link type="text/css" rel="stylesheet" href="{{ mix('front-assets/css/style.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ mix('front-assets/css/color.css') }}">
        {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
        @livewire('front.common.front-common-analytics-code-component')
        {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
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
            {{-- <a class="to-top"><i class="fas fa-caret-up"></i></a> --}}
            <a href="#" class="float" id="menu-share">
<i class="fad fa-phone my-float"></i>
</a>
<div class="menu-share-container">
    <ul>
<li><a href="mailto:info@offbeatstays.in" target="_blank" title="Send email">
<i class="fas fa-envelope my-float"></i>
</a></li>
<li><a href="https://web.whatsapp.com/send?phone=919667051161&text=Hello%20Stayers!%20I%27m%20looking%20for%20an%20Offbeat%20Stay." target="_blank" title="Ask the expert">
<i class="fab fa-whatsapp my-float"></i>
</a></li>
<li><a href="tel:+919667051161" target="_blank" title="Call Now">
<i class="fas fa-phone-volume my-float"></i>
</a></li>
</ul>
</div>

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

        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo&libraries=places&callback=initAutocomplete"></script>  --}}
        {{-- <script type="text/javascript" src="{{ asset('front-assets/js/map-single.js') }}"></script>          --}}
        @livewireScripts
        @stack('scripts')
        <script>
            window.onscroll = function(ev) {
              if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                  window.livewire.emit('load-more');
              }
            };
        </script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        showCloseButton: true,
        timer: 5000,
        timerProgressBar:true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    window.addEventListener('alert',({detail:{type,message}})=>{
        Toast.fire({
            icon:type,
            title:message
        })
    })
</script>

    </body>
</html>