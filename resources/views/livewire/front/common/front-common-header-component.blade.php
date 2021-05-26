<header class="main-header">
                <!-- header-top-->
                <div class="header-top fl-wrap">
                    <div class="container">
                        <div class="logo-holder">
                            <a href="{{ route('front.home')}}"><img src="{{ asset('front-assets/images/logo.png') }}" alt=""></a>
                        </div>
                        <a href="{{ route('admin.dashboard')}}" class="add-hotel">Add Your Hotel <span><i class="far fa-plus"></i></span></a>                     
                        {{-- <div class="show-reg-form modal-open"><i class="fa fa-sign-in"></i>Sign In</div> --}}
                        <a href="tel:919540785489" class="show-reg-form"><i class="fa fa-phone"></i>+91 9540 7854 89</a>
                        {{-- <a href="mailto:info@offbeatstays.in" class="show-reg-form"><i class="fa fa-envelope"></i>info@offbeatstays.in</a> --}}
                        {{-- <div class="lang-wrap">
                            <div class="show-lang"><img src="{{ asset('front-assets/images/lan/1.png') }}" alt=""> <span>Eng</span><i class="fa fa-caret-down"></i></div>
                            <ul class="lang-tooltip green-bg">
                                <li><a href="#"><img src="{{ asset('front-assets/images/lan/4.png') }}" alt=""> De</a></li>
                                <li><a href="#"><img src="{{ asset('front-assets/images/lan/5.png') }}" alt=""> It</a></li>
                                <li><a href="#"><img src="{{ asset('front-assets/images/lan/2.png') }}" alt=""> Fr</a></li>
                                <li><a href="#"><img src="{{ asset('front-assets/images/lan/3.png') }}" alt=""> Es</a></li>
                            </ul>
                        </div>
                        <div class="currency-wrap">
                            <div class="show-currency-tooltip"><i class="fas fa-dollar-sign"></i> <span>USD <i class="fa fa-caret-down"></i> </span></div>
                            <ul class="currency-tooltip">
                                <li><a href="#"><i class="far fa-euro-sign"></i> EUR</a></li>
                                <li><a href="#"><i class="far fa-pound-sign"></i> GBP</a></li>
                                <li><a href="#"><i class="far fa-ruble-sign"></i>RUR</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <!-- header-top end-->
                <!-- header-inner-->
                <div class="header-inner fl-wrap">
                    <div class="container">
                        <div class="show-search-button"><span>Search</span> <i class="fas fa-search"></i> </div>
                        <div class="wishlist-link"><i class="fal fa-heart"></i><span class="wl_counter">3</span></div>
                        <div class="header-user-menu">
                        	@auth
	                            <div class="header-user-name">
	                                <span>
	                                	 @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
	                                	 <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
	                                	 @endif
	                                	
	                                </span>
	                                {{ Auth::user()->name }}
	                            </div>
	                            <ul>
	                                <li><a href="{{ route('profile.show') }}"> Edit profile</a></li>
	                                {{-- <li><a href="dashboard-add-listing.html"> Add Listing</a></li> --}}
	                                {{-- <li><a href="dashboard-bookings.html">  Bookings  </a></li> --}}
	                                {{-- <li><a href="dashboard-review.html"> Reviews </a></li> --}}
	                                <li>
	                                	<!-- Authentication -->
	                            <form method="POST" action="{{ route('logout') }}">
	                                @csrf

	                                <x-jet-dropdown-link href="{{ route('logout') }}"
	                                         onclick="event.preventDefault();
	                                                this.closest('form').submit();">
	                                    {{ __('Log Out') }}
	                                </x-jet-dropdown-link>
	                            </form>

	                            </ul>
	                        @else
	                        	<div class="header-user-name">
	                                <span>
	                                	 
	                                	 <img src="{{ asset('front-assets/images/avatar/1.jpg') }}" alt="Guest">
	                                	 
	                                	
	                                </span>
	                                Guest Account
	                            </div>
	                            <ul>
	                                <li><a href="{{ route('login') }}"> Login</a></li>
	                                <li><a href="{{ route('register') }}"> Register</a></li>
	                            </ul>
	                        @endauth

                        </div>
                        <div class="home-btn"><a href="{{ route('front.home')}}"><i class="fas fa-home"></i></a></div>
                        <!-- nav-button-wrap-->
                        <div class="nav-button-wrap color-bg">
                            <div class="nav-button">
                                <span></span><span></span><span></span>
                            </div>
                        </div>
                        <!-- nav-button-wrap end-->
                        
                        <!--  navigation -->
                        <div class="nav-holder main-menu">
                            <nav>
                                <ul>
                                	<li>
                                        <a href="{{ route('front.category.all') }}">Stay Types</a>
                                    </li>
                                	<li>
                                        <a href="{{ route('front.state.all') }}">India</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.category.all') }}" class="{{ (strpos(Route::currentRouteName(), 'front.category') === 0 ) ? 'act-link' : '' }}">Categories <i class="fas fa-caret-down"></i></a>
                                        <!--second level -->
                                        <ul>
                                        	@foreach($categories as $category)
                                            <li><a href="{{ route('front.category.show', ['slug'=>$category->slug]) }}" class="{{ (strpos(Route::currentRouteName(), 'front.category.show') === 0 ) && (Route::current()->parameter('slug') == $category->slug) ? 'act-link' : '' }}">{{$category->name}}</a></li>
                                            @endforeach
                                            
                                        </ul>
                                        <!--second level end-->
                                    </li>
                                    <li>
                                        <a href="{{ route('front.state.all') }}" class="{{ (strpos(Route::currentRouteName(), 'front.state') === 0 ) ? 'act-link' : '' }}">India <i class="fas fa-caret-down"></i></a>
                                        <!--second level -->
                                        
                                        <ul>
                                        	@foreach($states as $state)
                                            <li><a href="{{ route('front.state.show', ['slug'=>$state->slug]) }}" class="{{ (strpos(Route::currentRouteName(), 'front.state.show') === 0 ) && (Route::current()->parameter('slug') == $state->slug) ? 'act-link' : '' }}">{{$state->name}}</a></li>
                                            {{-- <li>
                                                <a href="#">Single <i class="fas fa-caret-down"></i></a>
                                                <!--third  level  -->
                                                <ul>
                                                    <li><a href="listing-single4.html">Style 4</a></li>
                                                </ul>
                                                <!--third  level end-->
                                            </li> --}}
                                            @endforeach
                                            
                                        </ul>
                                        <!--second level end-->
                                    </li>
                                    {{-- <li>

                                        <a href="#">Home <i class="fas fa-caret-down"></i></a>
                                        <!--second level -->
                                        <ul>
                                            <li><a href="index.html">Parallax Image</a></li>
                                            <li><a href="index2.html">Slider</a></li>
                                            <li><a href="index3.html">Video</a></li>
                                            <li><a href="index4.html">Slideshow</a></li>
                                        </ul>
                                        <!--second level end-->
                                    </li> --}}
                                    
                                    {{-- <li>
                                        <a href="#">News</a>
                                    </li> --}}
                                    <li>
                                        <a href="#">Others <i class="fas fa-caret-down"></i></a>
                                        <!--second level -->
                                        <ul>
                                            <li><a href="{{ route('front.about') }}">About Us</a></li>
                                            <li><a href="{{ route('front.contact') }}">Contact Us</a></li>
                                            {{-- <li><a href="author-single.html">User single</a></li>
                                            <li><a href="help.html">Help FAQ</a></li>
                                            <li><a href="pricing-tables.html">Pricing</a></li>
                                            <li><a href="booking-single.html">Booking</a></li>
                                            <li><a href="dashboard.html">User Dashboard</a></li>
                                            <li><a href="blog2.html">Blog Classik</a></li>
                                            <li><a href="blog-single.html">Blog Single</a></li>
                                            <li><a href="dashboard-add-listing.html">Add Listing</a></li>
                                            <li><a href="404.html">404</a></li>
                                            <li><a href="invoice.html">Invoice</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li> --}}
                                        </ul>
                                        <!--second level end-->
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- navigation  end -->
                        <!-- wishlist-wrap-->            
                        <div class="wishlist-wrap scrollbar-inner novis_wishlist">
                            <div class="box-widget-content">
                                <div class="widget-posts fl-wrap">
                                    <ul>
                                        <li class="clearfix">
                                            <a href="#"  class="widget-posts-img"><img src="{{ asset('front-assets/images/gal/1.jpg') }}" class="respimg" alt=""></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Park Central</a>
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 40 JOURNAL SQUARE PLAZA, NJ, US</a></div>
                                                <span class="rooms-price">$80 <strong> /  Awg</strong></span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <a href="#"  class="widget-posts-img"><img src="{{ asset('front-assets/images/gal/1.jpg') }}" class="respimg" alt=""></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Holiday Home</a>
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="3"></div>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 75 PRINCE ST, NY, USA</a></div>
                                                <span class="rooms-price">$50 <strong> /   Awg</strong></span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <a href="#"  class="widget-posts-img"><img src="{{ asset('front-assets/images/gal/1.jpg') }}" class="respimg" alt=""></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Moonlight Hotel</a>
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="4"></div>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i>  70 BRIGHT ST NEW YORK, USA</a></div>
                                                <span class="rooms-price">$105 <strong> /  Awg</strong></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- wishlist-wrap end--> 
                    </div>
                </div>
                <!-- header-inner end-->
                <!-- header-search -->
                <div class="header-search vis-search">
                    <div class="container">
                        <div class="row">
                            <!-- header-search-input-item -->
                        	<form action="/search">
                            <div class="col-sm-4">
                                <div wire:ignore class="header-search-input-item fl-wrap ">
                                    <label>Stay Type</label>
                                    <select class="form-control" id="category-h" name="stay_type">
		        <option value="">StayType</option>
		        @foreach($categories as $category)
		        <option value="{{ $category->slug }}">{{ $category->name }}</option>
		        @endforeach
		    </select>
                                </div>
                            </div>
                            <!-- header-search-input-item end -->
                            <!-- header-search-input-item -->
                            <div class="col-sm-3">
                                <div class="header-search-input-item fl-wrap ">
                                    <label>Location </label>
                                    <select class="form-control" id="location-h"  name="stay_location">
		        <option value="">Location</option>
		        @foreach($states as $state)
		        <optgroup label="{{ $state->name }}">
		        	<option value="{{ $state->slug }}"> All {{ $state->name }}</option>
			        	@foreach($state->locations as $location)
			        
			        	<option value="{{ $location->slug }}">{{ $location->name }}</option>
		       
		        
		        		@endforeach
		        </optgroup>
		        
		        @endforeach
		    </select>
                                </div>
                            </div>
                            <!-- header-search-input-item end -->                             
                            <!-- header-search-input-item -->
                            {{-- <div class="col-sm-3">
                                <div class="header-search-input-item fl-wrap">
                                    <div class="quantity-item">
                                        <label>Rooms</label>
                                        <div class="quantity">
                                            <input type="number" min="1" max="3" step="1" value="1">
                                        </div>
                                    </div>
                                    <div class="quantity-item">
                                        <label>Adults</label>
                                        <div class="quantity">
                                            <input type="number" min="1" max="3" step="1" value="1">
                                        </div>
                                    </div>
                                    <div class="quantity-item">
                                        <label>Children</label>
                                        <div class="quantity">
                                            <input type="number" min="0" max="3" step="1" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- header-search-input-item end -->                             
                            <!-- header-search-input-item -->
                            <div class="col-sm-2">
                                <div class="header-search-input-item fl-wrap">
                                    <button class="header-search-button" >Search <i class="far fa-search"></i></button>
                                </div>
                            </div>
                            </form>
                            <!-- header-search-input-item end -->                                                          
                        </div>
                    </div>
                    <div class="close-header-search"><i class="fal fa-angle-double-up"></i></div>
                </div>
                <!-- header-search  end -->
                    @push('scripts')

<script>
    $(document).ready(function () {
        $('#category-h').select2();
        $('#category-h').on('change', function (e) {
            // var item = $('#category').select2("val");
            {{-- @this.set('viralSongs', item); --}}
        });
        $('#location-h').select2();
        $('#location-h').on('change', function (e) {
            // var item = $('#location').select2("val");
            {{-- @this.set('viralSongs', item); --}}
        });
    });

</script>

@endpush
            </header>
