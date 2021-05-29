<section class="parallax-section single-par" data-scrollax-parent="true">
                        <div class="bg par-elem "  data-bg="{{asset('front-assets/images/banners/India-Offbeat-Stays.jpg') }}" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title center-align big-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2><span>Stay Type</span></h2>
                                <span class="section-separator"></span>
                                <h4>Offbeat Stays type description</h4>
                            </div>
                        </div>
                        <div class="header-sec-link">
                            <div class="container"><a href="#sec1" class="custom-scroll-link color-bg"><i class="fal fa-angle-double-down"></i></a></div>
                        </div>
                    </section>
                    <!--  section  end-->
                    <div class="breadcrumbs-fs fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs fl-wrap"><a href="{{ route('front.home') }}">Home</a><span>Stay Types</span></div>
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
                                @forelse($categories as $category)
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <div class="listing-counter"><span>{{$category->properties_count}} </span> Hotels</div>
                                            <img  src="{{ asset($category->image ?? 'front-assets/images/city/1.jpg') }}"   alt="">
                                            <div class="listing-item-cat">
                                                <h3><a href="{{ route('front.category.show', ['slug' => $category->slug]) }}">{{ $category->name }}</a></h3>
                                                <div class="weather-grid"   data-grcity="{{ $category->name }}"></div>
                                                <div class="clearfix"></div>
                                                <p>{{ $category->description }}</p>
                                            </div>
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
                    </section>
                    <!-- section end -->
