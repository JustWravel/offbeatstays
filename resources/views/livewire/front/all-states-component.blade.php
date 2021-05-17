<section class="parallax-section single-par" data-scrollax-parent="true">
                        <div class="bg par-elem "  data-bg="{{asset('front-assets/images/banners/India-Offbeat-Stays.jpg') }}" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title center-align big-title">
                                <h2><span>Offbeat Stays in India</span></h2>
                                <span class="section-separator"></span>
                                
                            </div>
                        </div>
                        {{-- <div class="header-sec-link">
                            <div class="container"><a href="#sec1" class="custom-scroll-link color-bg"><i class="fal fa-angle-double-down"></i></a></div>
                        </div> --}}
                    </section>
                    <!--  section  end-->
                    <div class="breadcrumbs-fs fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs fl-wrap"><a href="#">Home</a><a href="#">Listings</a><span>Listings Without Map</span></div>
                        </div>
                    </div>
                    <!--section -->
                    <section id="sec2">
                        {{-- <div class="container">
                            <div class="section-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2>Popular Destination</h2>
                                <span class="section-separator"></span>
                                <p>Explore some of the best tips from around the city from our partners and friends.</p>
                            </div>
						 </div> --}}
						 <div class="container">
						 	<div class="row">
						 		
                            <!-- portfolio start -->
                            <div class="gallery-items fl-wrap mr-bot spad home-grid">
                                @forelse($states as $state)
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <div class="listing-counter"><span>79 </span> Hotels</div>
                                            <a href="{{ route('front.state.show', ['slug' => $state->slug]) }}">
                                            <img  src="{{ asset($state->image ?? 'front-assets/images/city/1.jpg') }}"   alt="">

                                            <div class="listing-item-cat">
                                                <h3><a href="{{ route('front.state.show', ['slug' => $state->slug]) }}">{{ $state->name }}</a></h3>
                                                {{-- <div class="weather-grid"   data-grcity="{{ $state->name }}"></div> --}}
                                                <div class="clearfix"></div>
                                                {{-- <p></p> --}}
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                                @empty
                                <p>No States to Show</p>
                                @endforelse
                                <!-- gallery-item-->
                                <div class="gallery-item gallery-item-second">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <img  src="{{ asset('front-assets/images/city/3.jpg') }}"   alt="">
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
                                <!-- gallery-item end-->
                                
                            </div>

						 	</div>
						 </div>
                            <!-- portfolio end -->
                            <a href="listing.html" class="btn    color-bg">Explore All Cities<i class="fas fa-caret-right"></i></a>
                    </section>
                    <!-- section end -->
