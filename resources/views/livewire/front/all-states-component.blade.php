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
                    <div id="sec2">
                        
						 <div class="container">
						 	<div class="row">
						 		
                            <!-- portfolio start -->
                            <div class="gallery-items fl-wrap mr-bot spad home-grid">
                                @forelse($states as $state)
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <div class="listing-counter"><span>{{ $state->properties_count}} </span> @if($state->properties_count > 1) Properties @else Property @endif</div>
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
                                
                                
                            </div>

						 	</div>
						 </div>
                            <!-- portfolio end -->
                            {{-- <a href="listing.html" class="btn    color-bg">Explore All Cities<i class="fas fa-caret-right"></i></a> --}}
                    </div>
                    <!-- section end -->
