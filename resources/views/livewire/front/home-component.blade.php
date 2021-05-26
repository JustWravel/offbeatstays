                    <section class="hero-section" data-scrollax-parent="true" id="sec1">
                        <div class="hero-parallax">
                        <div class="slideshow-container" data-scrollax="properties: { translateY: '200px' }" >
                            <!-- slideshow-item -->	
                            <div class="slideshow-item">
                                <div class="bg"  data-bg="{{ asset('front-assets/images/home-slider/slider-offbeat-stays-1.jpg') }}"></div>
                            </div>
                            <!--  slideshow-item end  -->	
                            <!-- slideshow-item -->	
                            <div class="slideshow-item">
                                <div class="bg"  data-bg="{{ asset('front-assets/images/home-slider/slider-offbeat-stays-2.jpg') }}"></div>
                            </div>
                            <!--  slideshow-item end  -->	
                            <!-- slideshow-item -->	
                            <div class="slideshow-item">
                                <div class="bg"  data-bg="{{ asset('front-assets/images/home-slider/slider-offbeat-stays-3.jpg') }}"></div>
                            </div>
                            <!--  slideshow-item end  -->	                        
                        </div>
                            <div class="overlay op7"></div>
                        </div>
                        <div class="hero-section-wrap fl-wrap">
                            <div class="container">
                                <div class="home-intro">
                                    <div class="section-title-separator"><span></span></div>
                                    <h2>Offbeat Stays in India</h2>
                                    <span class="section-separator"></span>                                    
                                    <h3>The Best Stay options in offbeat destinations in India. Experiential Stays , Nature Therapy and for your memorable holiday experience.</h3>
                                </div>
                                @livewire('front.front-home-main-search-component')
                            </div>
                        </div>
                        <div class="header-sec-link">
                            <div class="container"><a href="#sec2" class="custom-scroll-link color-bg"><i class="fal fa-angle-double-down"></i></a></div>
                        </div>
                    </section>
                    <!-- section end -->
                    <!--section -->
                    <section id="sec2">
                        <div class="container">
                            <div class="section-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2>Popular Destination</h2>
                                <span class="section-separator"></span>
                                <p>Explore some of the best tips from around the city from our partners and friends.</p>
                            </div>
						 </div>
                         <style type="text/css" media="screen">
                             .gallery-items.home-grid .gallery-item .listing-item-grid {
    
    height: 250px;
}
                         </style>
                            <!-- portfolio start -->
                            <div class="gallery-items fl-wrap mr-bot spad home-grid">
                                <!-- gallery-item-->
                                @foreach($popular_destinations as $popular_destination)
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <div class="listing-counter"><span>{{count($popular_destination->properties)}} </span> @if(count($popular_destination->properties) > 1) Properties @else Property @endif</div>
                                            <a href="{{ route('front.state.show', ['slug'=>$popular_destination->slug])}}">
                                                <img  src="{{ $popular_destination->image ?? asset('front-assets/images/city/1.jpg') }}"   alt="{{$popular_destination->name}} - Offbeat Stays">
                                            </a>
                                            <div class="listing-item-cat">
                                                <a href="{{ route('front.state.show', ['slug'=>$popular_destination->slug])}}">
                                                <h3>{{$popular_destination->name}}</h3>
                                                {{-- <div class="weather-grid"   data-grcity="Rome"></div> --}}
                                                <div class="clearfix"></div>
                                                </a>
                                                {{-- <p>Constant care and attention to the patients makes good record</p> --}}
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                                
                                @endforeach
                                <!-- gallery-item end-->
                                {{-- <!-- gallery-item-->
                                <div class="gallery-item gallery-item-second">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <img  src="{{ asset('front-assets/images/city/1.jpg') }}"   alt="">
                                            <div class="listing-counter"><span>43 </span> Hotels</div>
                                            <div class="listing-item-cat">
                                                <h3><a href="listing.html">Paris</a></h3>
                                                <div class="weather-grid"   data-grcity="Paris"></div>
                                                <div class="clearfix"></div>
                                                <p>Constant care and attention to the patients makes good record</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end--> --}}
                                
                            </div>
                            <!-- portfolio end -->
                            <a href="listing.html" class="btn    color-bg">Explore All Cities<i class="fas fa-caret-right"></i></a>
                    </section>
                    <!-- section end -->
                    <!-- section-->
                    <section class="grey-blue-bg">
                        <!-- container-->
                        <div class="container">
                            <div class="section-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2>Recently Added Hotels</h2>
                                <span class="section-separator"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                            </div>
                        </div>
                        <!-- container end-->
                        <!-- carousel -->
                        <div class="list-carousel fl-wrap card-listing ">
                            <!--listing-carousel-->
                            <div class="listing-carousel  fl-wrap ">
                                @foreach($recently_added_properties as $recently_added_property)
                                <!--slick-slide-item-->
                                <div class="slick-slide-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <a href="{{ route('front.property.show', ['state'=> $recently_added_property->state->slug, 'location'=> $recently_added_property->location->slug, 'category'=> $recently_added_property->category->slug, 'slug'=> $recently_added_property->slug])}}"><img src="{{ $recently_added_property->images[0]->name ?? asset('front-assets/images/gal/1.jpg') }}" alt=""></a>
                                                {{-- <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('front-assets/images/avatar/1.jpg') }}" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>Alisa Noory</strong></span>
                                                </div>
                                                <div class="sale-window">Sale 20%</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                    <div class="rate-class-name">
                                                        <div class="score"><strong>Very Good</strong>27 Reviews </div>
                                                        <span>5.0</span>                                             
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map"><a href="{{ route('front.property.show', ['state'=> $recently_added_property->state->slug, 'location'=> $recently_added_property->location->slug, 'category'=> $recently_added_property->category->slug, 'slug'=> $recently_added_property->slug])}}">{{$recently_added_property->name}}</a></h3>
                                                        <div class="geodir-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i> {{$recently_added_property->location->name}}, {{$recently_added_property->state->name}}</a></div>
                                                    </div>
                                                </div>
                                                <div style="text-align: justify;">
                                                                {{ html_entity_decode(substr(strip_tags($recently_added_property->description), 0, 100)) }}
                                                            </div>
                                                <ul class="facilities-list fl-wrap">
                                                    @forelse($recently_added_property->amenities as $amenity)
                                                                    <li><i class="{{$amenity->iconclass}}"></i><span>{{$amenity->name}}</span></li>
                                                                @empty
                                                                    <li><i class="fal fa-"></i><span></span></li>
                                                                @endforelse
                                                </ul>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <div class="geodir-category-price">Awg/Night <span>$ 320</span></div>
                                                    <div class="geodir-opt-list">
                                                        <a href="#" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map</span></a>
                                                        <a href="#" class="geodir-js-favorite"><i class="fal fa-heart"></i><span class="geodir-opt-tooltip">Save</span></a>
                                                        <a href="#" class="geodir-js-booking"><i class="fal fa-exchange"></i><span class="geodir-opt-tooltip">Find Directions</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <!--slick-slide-item end-->
                                @endforeach
                            </div>
                            <!--listing-carousel end-->
                            <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                            <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                        </div>
                        <!--  carousel end-->
                    </section>
                    <!-- section end -->
                    <!--section -->
                    {{-- <section class="parallax-section" data-scrollax-parent="true">
                        <div class="bg"  data-bg="{{ asset('front-assets/images/bg/1.jpg') }}" data-scrollax="properties: { translateY: '100px' }"></div>
                        <div class="overlay op7"></div>
                        <!--container-->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="colomn-text fl-wrap pad-top-column-text_small">
                                        <div class="colomn-text-title">
                                            <h3>Most Popular Hotels</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                                            <a href="listing.html" class="btn  color2-bg float-btn">View All Hotels<i class="fas fa-caret-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <!--light-carousel-wrap-->
                                    <div class="light-carousel-wrap fl-wrap">
                                        <!--light-carousel-->
                                        <div class="light-carousel">
                                            <!--slick-slide-item-->
                                            <div class="slick-slide-item">
                                                <div class="hotel-card fl-wrap title-sin_item">
                                                    <div class="geodir-category-img card-post">
                                                        <a href="listing-single.html"><img src="{{ asset('front-assets/images/gal/1.jpg') }}" alt=""></a>
                                                        <div class="listing-counter">Awg/Night <strong>$85</strong></div>
                                                        <div class="sale-window">Sale 20%</div>
                                                        <div class="geodir-category-opt">
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                            <h4 class="title-sin_map"><a href="listing-single.html">Moonlight Hotel</a></h4>
                                                            <div class="geodir-category-location"><a href="#" class="single-map-item" data-newlatitude="40.90261483" data-newlongitude="-74.15737152"><i class="fas fa-map-marker-alt"></i> 75 Prince St,  NY, USA</a></div>
                                                            <div class="rate-class-name">
                                                                <div class="score"><strong> Good</strong>8 Reviews </div>
                                                                <span>4.8</span>                                             
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--slick-slide-item end-->
                                            <!--slick-slide-item-->
                                            <div class="slick-slide-item">
                                                <div class="hotel-card fl-wrap title-sin_item">
                                                    <div class="geodir-category-img">
                                                        <a href="listing-single.html"><img src="{{ asset('front-assets/images/gal/1.jpg') }}" alt=""></a>
                                                        <div class="listing-counter">Awg/Night <strong>$80</strong></div>
                                                        <div class="sale-window big-sale">Sale 50%</div>
                                                        <div class="geodir-category-opt">
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                            <h4 class="title-sin_map"><a href="listing-single.html">Holiday Home</a></h4>
                                                            <div class="geodir-category-location"><a href="#" class="single-map-item" data-newlatitude="40.72228267" data-newlongitude="-73.99246214"><i class="fas fa-map-marker-alt"></i> 34-42 Montgomery St , NY, USA</a></div>
                                                            <div class="rate-class-name">
                                                                <div class="score"><strong> Good</strong>2 Reviews </div>
                                                                <span>4.7</span>                                             
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--slick-slide-item end-->
                                            <!--slick-slide-item-->
                                            <div class="slick-slide-item">
                                                <div class="hotel-card fl-wrap title-sin_item">
                                                    <div class="geodir-category-img">
                                                        <a href="listing-single.html"><img src="{{ asset('front-assets/images/gal/1.jpg') }}" alt=""></a>
                                                        <div class="listing-counter"> <strong>$120</strong>/Night</div>
                                                        <div class="sale-window">Sale 10%</div>
                                                        <div class="geodir-category-opt">
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                            <h4 class="title-sin_map"><a href="listing-single.html">Grand Hero Palace</a></h4>
                                                            <div class="geodir-category-location"><a href="#" class="single-map-item" data-newlatitude="40.76221766" data-newlongitude="-73.96511769"><i class="fas fa-map-marker-alt"></i> 70 Bright St New York, USA</a></div>
                                                            <div class="rate-class-name">
                                                                <div class="score"><strong> Good</strong>31 Reviews </div>
                                                                <span>4.9</span>                                             
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--slick-slide-item end-->                                            
                                        </div>
                                        <!--light-carousel end-->
                                        <div class="fc-cont  lc-prev"><i class="fal fa-angle-left"></i></div>
                                        <div class="fc-cont  lc-next"><i class="fal fa-angle-right"></i></div>
                                    </div>
                                    <!--light-carousel-wrap end-->
                                </div>
                            </div>
                        </div>
                    </section> --}}
                    <!-- section end -->
                    <!--section -->
                    <section>
                        <div class="container">
                            <div class="section-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2>Why Choose Us</h2>
                                <span class="section-separator"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                            </div>
                            <!-- -->
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- process-item-->
                                    <div class="process-item big-pad-pr-item">
                                        <span class="process-count"> </span>
                                        <div class="time-line-icon"><i class="fal fa-headset"></i></div>
                                        <h4><a href="#"> Best service guarantee</a></h4>
                                        <p>Proin dapibus nisl ornare diam varius tempus. Aenean a quam luctus, finibus tellus ut, convallis eros sollicitudin turpis.</p>
                                    </div>
                                    <!-- process-item end -->
                                </div>
                                <div class="col-md-4">
                                    <!-- process-item-->
                                    <div class="process-item big-pad-pr-item">
                                        <span class="process-count"> </span>
                                        <div class="time-line-icon"><i class="fal fa-gift"></i></div>
                                        <h4> <a href="#">Exclusive gifts</a></h4>
                                        <p>Proin dapibus nisl ornare diam varius tempus. Aenean a quam luctus, finibus tellus ut, convallis eros sollicitudin turpis.</p>
                                    </div>
                                    <!-- process-item end -->                                
                                </div>
                                <div class="col-md-4">
                                    <!-- process-item-->
                                    <div class="process-item big-pad-pr-item nodecpre">
                                        <span class="process-count"> </span>
                                        <div class="time-line-icon"><i class="fal fa-credit-card"></i></div>
                                        <h4><a href="#"> Get more from your card</a></h4>
                                        <p>Proin dapibus nisl ornare diam varius tempus. Aenean a quam luctus, finibus tellus ut, convallis eros sollicitudin turpis.</p>
                                    </div>
                                    <!-- process-item end -->                                
                                </div>
                            </div>
                            <!--process-wrap   end-->
                            <div class=" single-facts fl-wrap mar-top">
                                <!-- inline-facts -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="fal fa-users"></i>
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="254">154</div>
                                            </div>
                                        </div>
                                        <h6>New Visiters Every Week</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="fal fa-thumbs-up"></i>
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="12168">12168</div>
                                            </div>
                                        </div>
                                        <h6>Happy customers every year</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="fal fa-award"></i>
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="172">172</div>
                                            </div>
                                        </div>
                                        <h6>Won Awards</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <i class="fal fa-hotel"></i>
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="732">732</div>
                                            </div>
                                        </div>
                                        <h6>New Listing Every Week</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
                    <!--section -->
                    {{-- <section class="color-bg hidden-section">
                        <div class="wave-bg wave-bg2"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- -->
                                    <div class="colomn-text  pad-top-column-text fl-wrap">
                                        <div class="colomn-text-title">
                                            <h3>Our App   Available Now</h3>
                                            <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam erat.</p>
                                            <a href="#" class=" down-btn color3-bg"><i class="fab fa-apple"></i> Download for iPhone</a>
                                            <a href="#" class=" down-btn color3-bg"><i class="fab fa-android"></i> Download for Android</a>
                                        </div>
                                    </div>
                                    process-wrap   end                                
                                </div>
                                <div class="col-md-6">
                                    <div class="collage-image">
                                        <img src="{{ asset('front-assets/images/api.png') }}" class="main-collage-image" alt="">
                                        <div class="images-collage-title color3-bg">Easy<span>Book</span></div>
                                        <div class="collage-image-min cim_1"><img src="{{ asset('front-assets/images/api/1.jpg') }}" alt=""></div>
                                        <div class="collage-image-min cim_2"><img src="{{ asset('front-assets/images/api/1.jpg') }}" alt=""></div>
                                        <div class="collage-image-min cim_3"><img src="{{ asset('front-assets/images/api/1.jpg') }}" alt=""></div>
                                        <div class="collage-image-input">Search <i class="fa fa-search"></i></div>
                                        <div class="collage-image-btn color2-bg">Booking now</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> --}}
                    <!-- section end -->
                    <!--section -->
                    <section>
                        <div class="container">
                            <div class="section-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2>Testimonials</h2>
                                <span class="section-separator"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!--slider-carousel-wrap -->
                        <div class="slider-carousel-wrap text-carousel-wrap fl-wrap">
                            <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                            <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                            <div class="text-carousel single-carousel fl-wrap">
                                <!--slick-item -->
                                <div class="slick-item">
                                    <div class="text-carousel-item">
                                        <div class="popup-avatar"><img src="{{ asset('front-assets/images/testimonial-user/1.jpg') }}" alt=""></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                        <div class="review-owner fl-wrap">Kashish Aneja  - <span>RJ, Red FM</span></div>
                                        <p> "I booked a property in Manali with Offbeat Stays and undoubtedly, it ended up becoming my best decision after lockdown. From the peaceful state of mind, the breathtakingly beautiful views and location, the class-apart services provided to me and to paying heed to the tiniest of my requirements I simply cannot complain about a single thing. Can't wait to be back at it again."</p>
                                        {{-- <a href="#" class="testim-link">Via Facebook</a> --}}
                                    </div>
                                </div>
                                <!--slick-item end -->
                                <!--slick-item -->
                                <div class="slick-item">
                                    <div class="text-carousel-item">
                                        <div class="popup-avatar"><img src="{{ asset('front-assets/images/testimonial-user/2.jpg') }}" alt=""></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4"> </div>
                                        <div class="review-owner fl-wrap">Rythm Chaudhary  - <span>Software Engineer, TCS</span></div>
                                        <p> "So after spending literally an eternity in this lockdown i was craving for a beach view property and of course along with the lavishness I deserved after all this while. I got in touch with off beat stays and the experience has been wonderfully inexplicable."</p>
                                        {{-- <a href="#" class="testim-link">Via Facebook</a> --}}
                                    </div>
                                </div>
                                <!--slick-item end -->
                                <!--slick-item -->
                                <div class="slick-item">
                                    <div class="text-carousel-item">
                                        <div class="popup-avatar"><img src="{{ asset('front-assets/images/testimonial-user/3.jpg') }}" alt=""></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                        <div class="review-owner fl-wrap">Apoorva Sharma  - <span>Freelancer, SEO & SEM </span></div>
                                        <p> "At first I was quite confused about this work from mountains thing as I was going to travel solo but later on over a period of time I made up my mind and booked my staycation with Offbeat Stays.  Got an amazing and cozy homestay in Himachal surrounded with lush green scenery and Himalayan range. The best part was the sunsets from my room balcony. Didn't really feels like you're away from home. I would really recommend it to all those seeking staycations around Himalayas."</p>
                                        {{-- <a href="#" class="testim-link">Via Facebook</a> --}}
                                    </div>
                                </div>
                                <!--slick-item end -->
                                <!--slick-item -->
                                <div class="slick-item">
                                    <div class="text-carousel-item">
                                        <div class="popup-avatar"><img src="{{ asset('front-assets/images/testimonial-user/4.jpg') }}" alt=""></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                        <div class="review-owner fl-wrap">Parth Shukla  - <span>Auditing Executive, Deloitte</span></div>
                                        <p> "You do not always want to be on a vacation at a really populous destination amidst the crowd. At times it is more about exploring the unexplored and connecting with the nature merely. And that's when I found this amazing mud house in Himachal through offbeat stays which was the exact crystal clear representation of the image I had painted in my mind."</p>
                                        {{-- <a href="#" class="testim-link">Via Facebook</a> --}}
                                    </div>
                                </div>
                                <!--slick-item end -->
                            </div>
                        </div>
                        <!--slider-carousel-wrap end-->
                    </section>
                    <!-- section end-->
                    {{-- <section class="parallax-section" data-scrollax-parent="true">
                        <div class="bg"  data-bg="{{ asset('front-assets/images/bg/1.jpg') }}" data-scrollax="properties: { translateY: '100px' }"></div>
                        <div class="overlay"></div>
                        <!--container-->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <!-- column text-->
                                    <div class="colomn-text fl-wrap">
                                        <div class="colomn-text-title">
                                            <h3>The owner of the hotel or business ?</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                                            <a href="dashboard-add-listing.html" class="btn  color-bg float-btn">Add your hotel<i class="fal fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <!--column text   end-->
                                </div>
                            </div>
                        </div>
                    </section> --}}
                    <!-- section end -->
                    <!--section -->                       
                    {{-- <section class=" middle-padding">
                        <div class="container">
                            <div class="section-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2>Tips & Articles</h2>
                                <span class="section-separator"></span>
                                <p>Browse the latest articles from our blog.</p>
                            </div>
                            <div class="row home-posts">
                                <div class="col-md-4">
                                    <article class="card-post">
                                        <div class="card-post-img fl-wrap">
                                            <a href="blog-single.html"><img  src="{{ asset('front-assets/images/all/1.jpg') }}"   alt=""></a>
                                        </div>
                                        <div class="card-post-content fl-wrap">
                                            <h3><a href="blog-single.html">Blog Post Title.</a></h3>
                                            <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. </p>
                                            <div class="post-author"><a href="#"><img src="{{ asset('front-assets/images/avatar/1.jpg') }}" alt=""><span>By , Mery Lynn</span></a></div>
                                            <div class="post-opt">
                                                <ul>
                                                    <li><i class="fal fa-calendar"></i> <span>25 April 2018</span></li>
                                                    <li><i class="fal fa-eye"></i> <span>264</span></li>
                                                    <li><i class="fal fa-tags"></i> <a href="#">Design</a>  </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-4">
                                    <article class="card-post">
                                        <div class="card-post-img fl-wrap">
                                            <div class="list-single-main-media fl-wrap">
                                                <div class="single-slider-wrapper fl-wrap">
                                                    <div class="single-slider fl-wrap"  >
                                                        <div class="slick-slide-item"><img src="{{ asset('front-assets/images/all/1.jpg') }}" alt=""></div>
                                                        <div class="slick-slide-item"><img src="{{ asset('front-assets/images/all/1.jpg') }}" alt=""></div>
                                                        <div class="slick-slide-item"><img src="{{ asset('front-assets/images/all/1.jpg') }}" alt=""></div>
                                                    </div>
                                                    <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                                                    <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-post-content fl-wrap">
                                            <h3><a href="blog-single.html">Blog Post Title.</a></h3>
                                            <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. </p>
                                            <div class="post-author"><a href="#"><img src="{{ asset('front-assets/images/avatar/1.jpg') }}" alt=""><span>By , Mery Lynn</span></a></div>
                                            <div class="post-opt">
                                                <ul>
                                                    <li><i class="fal fa-calendar"></i> <span>25 April 2018</span></li>
                                                    <li><i class="fal fa-eye"></i> <span>264</span></li>
                                                    <li><i class="fal fa-tags"></i> <a href="#">Design</a>  </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-md-4">
                                    <article class="card-post">
                                        <div class="card-post-img fl-wrap">
                                            <a href="blog-single.html"><img  src="{{ asset('front-assets/images/all/1.jpg') }}"   alt=""></a>
                                        </div>
                                        <div class="card-post-content fl-wrap">
                                            <h3><a href="blog-single.html">Blog Post Title.</a></h3>
                                            <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. </p>
                                            <div class="post-author"><a href="#"><img src="{{ asset('front-assets/images/avatar/1.jpg') }}" alt=""><span>By , Mery Lynn</span></a></div>
                                            <div class="post-opt">
                                                <ul>
                                                    <li><i class="fal fa-calendar"></i> <span>25 April 2018</span></li>
                                                    <li><i class="fal fa-eye"></i> <span>264</span></li>
                                                    <li><i class="fal fa-tags"></i> <a href="#">Design</a>  </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <a href="blog.html" class="btn    color-bg ">Read All News<i class="fas fa-caret-right"></i></a>
                        </div>
                        <div class="section-decor"></div>
                    </section> --}}
