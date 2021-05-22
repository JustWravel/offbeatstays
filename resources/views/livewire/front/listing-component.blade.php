<section class="parallax-section single-par" data-scrollax-parent="true">
                        <div class="bg par-elem "  data-bg="images/bg/1.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title center-align big-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2><span>New York Hotels</span></h2>
                                <span class="section-separator"></span>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit amet fermentum sem.</h4>
                            </div>
                        </div>
                        <div class="header-sec-link">
                            <div class="container"><a href="#sec1" class="custom-scroll-link color-bg"><i class="fal fa-angle-double-down"></i></a></div>
                        </div>
                    </section>
                    <!--  section  end-->
                    <div class="breadcrumbs-fs fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs fl-wrap"><a href="#">Home</a><a href="#">Listings</a><span>Listings Without Map</span></div>
                        </div>
                    </div>
                    <!--section -->
                    <section class="grey-blue-bg small-padding" id="sec1">
                        <div class="container">
                            <div class="row">
                                <!--listing -->
                                <div class="col-md-12">
                                    <div class="mobile-list-controls fl-wrap mar-bot-cont">
                                        <div class="mlc show-list-wrap-search fl-wrap"><i class="fal fa-filter"></i> Filter</div>
                                    </div>
                                    <!--list-wrap-search   -->
                                    <div class="list-wrap-search lisfw fl-wrap lws_mobile">
                                        <div class="container">
                                            <div class="row">
                                                <!-- col-list-search-input-item -->
                                                <div class="col-md-4">
                                                    <div class="col-list-search-input-item in-loc-dec fl-wrap not-vis-arrow">
                                                        <label>City/Category</label>
                                                        <div class="listsearch-input-item">
                                                            <select data-placeholder="City" class="chosen-select" >
                                                                <option>All Cities</option>
                                                                <option>New York</option>
                                                                <option>London</option>
                                                                <option>Paris</option>
                                                                <option>Kiev</option>
                                                                <option>Moscow</option>
                                                                <option>Dubai</option>
                                                                <option>Rome</option>
                                                                <option>Beijing</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col-list-search-input-item end -->
                                                <!-- col-list-search-input-item -->
                                                <div class="col-md-5">
                                                    <div class="col-list-search-input-item fl-wrap location autocomplete-container">
                                                        <label>Destination</label>
                                                        <span class="header-search-input-item-icon"><i class="fal fa-map-marker-alt"></i></span>
                                                        <input type="text" placeholder="Destination or Hotel Name" class="autocomplete-input" id="autocompleteid3" value=""/>
                                                        <a href="#"><i class="fal fa-dot-circle"></i></a>
                                                    </div>
                                                </div>
                                                <!-- col-list-search-input-item end -->                  
                                                <!-- col-list-search-input-item -->
                                                <div class="col-md-3">
                                                    <div class="col-list-search-input-item in-loc-dec date-container  fl-wrap">
                                                        <label>Date In-Out </label>
                                                        <span class="header-search-input-item-icon"><i class="fal fa-calendar-check"></i></span>
                                                        <input type="text"   placeholder="When" name="dates"   value=""/>
                                                    </div>
                                                </div>
                                                <!-- col-list-search-input-item end -->
                                            </div>
                                            <div class="search-opt-wrap fl-wrap">
                                                <div class="search-opt-wrap-container">
                                                    <!-- col-list-search-input-item -->
                                                    <div class="search-input-item midd-input">
                                                        <div class="col-list-search-input-item fl-wrap">
                                                            <div class="quantity-item">
                                                                <label>Rooms</label>
                                                                <div class="quantity">
                                                                    <input type="number" min="1" max="3" step="1" value="1">
                                                                </div>
                                                            </div>
                                                            <div class="quantity-item">
                                                                <label>Adults</label>
                                                                <div class="quantity">
                                                                    <input type="number" min="1" max="5" step="1" value="1">
                                                                </div>
                                                            </div>
                                                            <div class="quantity-item">
                                                                <label>Children</label>
                                                                <div class="quantity">
                                                                    <input type="number" min="0" max="3" step="1" value="0">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- col-list-search-input-item end -->                             
                                                    <!-- col-list-search-input-item -->
                                                    <div class="search-input-item">
                                                        <div class="range-slider-title">Price range</div>
                                                        <div class="range-slider-wrap fl-wrap">
                                                            <input class="range-slider" data-from="300" data-to="1200" data-step="50" data-min="50" data-max="2000" data-prefix="$">
                                                        </div>
                                                    </div>
                                                    <!-- col-list-search-input-item end -->                             
                                                    <!-- col-list-search-input-item -->										
                                                    <div class="search-input-item small-input ">
                                                        <div class="col-list-search-input-item fl-wrap">
                                                            <button class="header-search-button" onclick="window.location.href='listing.html'">Search <i class="far fa-search"></i></button>
                                                        </div>
                                                    </div>
                                                    <!-- col-list-search-input-item end -->  
                                                    <!-- hidden-listing-filter -->
                                                    <div class="hidden-listing-filter fl-wrap">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <!--col-list-search-input-item -->
                                                                <div class="col-list-search-input-item fl-wrap">
                                                                    <h4>Review Score</h4>
                                                                    <div class="search-opt-container fl-wrap">
                                                                        <!-- Checkboxes -->
                                                                        <ul class="fl-wrap filter-tags">
                                                                            <li class="five-star-rating">
                                                                                <input id="check-aa2" type="checkbox" name="check" checked>
                                                                                <label for="check-aa2"><span class="listing-rating card-popup-rainingvis" data-starrating2="5"><span>5 Stars</span></span></label>
                                                                            </li>
                                                                            <li class="four-star-rating">
                                                                                <input id="check-aa3" type="checkbox" name="check">
                                                                                <label for="check-aa3"><span class="listing-rating card-popup-rainingvis" data-starrating2="5"><span>4 Star</span></span></label>
                                                                            </li>
                                                                            <li class="three-star-rating">                                          
                                                                                <input id="check-aa4" type="checkbox" name="check">
                                                                                <label for="check-aa4"><span class="listing-rating card-popup-rainingvis" data-starrating2="5"><span>3 Star</span></span></label>
                                                                            </li>
                                                                        </ul>
                                                                        <!-- Checkboxes end -->
                                                                    </div>
                                                                </div>
                                                                <!--col-list-search-input-item end--> 
                                                            </div>
                                                            <div class="col-md-8">
                                                                <!--col-list-search-input-item -->
                                                                <div class="col-list-search-input-item fl-wrap">
                                                                    <h4>Facilities</h4>
                                                                    <div class="search-opt-container fl-wrap">
                                                                        <!-- Checkboxes -->
                                                                        <ul class="fl-wrap filter-tags half-tags">
                                                                            <li>
                                                                                <input id="check-aaa5" type="checkbox" name="check" checked>
                                                                                <label for="check-aaa5">Free WiFi</label>
                                                                            </li>
                                                                            <li>
                                                                                <input id="check-bb5" type="checkbox" name="check" checked>
                                                                                <label for="check-bb5">Parking</label>
                                                                            </li>
                                                                            <li>                                       
                                                                                <input id="check-dd5" type="checkbox" name="check">
                                                                                <label for="check-dd5">Fitness Center</label>
                                                                            </li>
                                                                        </ul>
                                                                        <!-- Checkboxes end -->
                                                                        <!-- Checkboxes -->
                                                                        <ul class="fl-wrap filter-tags half-tags">
                                                                            <li>                                          
                                                                                <input id="check-cc5" type="checkbox" name="check">
                                                                                <label for="check-cc5">Non-smoking Rooms</label>
                                                                            </li>
                                                                            <li>                                       
                                                                                <input id="check-ff5" type="checkbox" name="check" checked>
                                                                                <label for="check-ff5">Airport Shuttle</label>
                                                                            </li>
                                                                            <li>                                          
                                                                                <input id="check-c4" type="checkbox" name="check">
                                                                                <label for="check-c4">Air Conditioning</label>
                                                                            </li>
                                                                        </ul>
                                                                        <!-- Checkboxes end -->
                                                                    </div>
                                                                </div>
                                                                <!--col-list-search-input-item end-->                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- hidden-listing-filter end -->
                                                </div>
                                                <div class="show-more-filters act-hiddenpanel color3-bg"><i class="fal fa-plus"></i><span>More options</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-list-wrap fw-col-list-wrap">
                                        <!-- list-main-wrap-->
                                        <div class="list-main-wrap fl-wrap card-listing">
                                            <!-- list-main-wrap-opt-->
                                            <div class="list-main-wrap-opt fl-wrap">
                                                <div class="list-main-wrap-title fl-wrap col-title">
                                                    <h2>Results For : <span>New York </span></h2>
                                                </div>
                                                <!-- price-opt-->
                                                <div class="price-opt">
                                                    <span class="price-opt-title">Sort results by:</span>
                                                    <div class="listsearch-input-item">
                                                        <select data-placeholder="Popularity" wire:model="sortby" id="sortby" >
                                                            <option value="">Popularity</option>
                                                            <option value="a">Average rating</option>
                                                            <option value="priceasc">Price: low to high</option>
                                                            <option value="pricedesc">Price: high to low</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- price-opt end-->
                                                <!-- price-opt-->
                                                <div class="grid-opt">
                                                    <ul>
                                                        <li><span class="two-col-grid act-grid-opt"><i class="fas fa-th-large"></i></span></li>
                                                        <li><span class="one-col-grid"><i class="fas fa-bars"></i></span></li>
                                                    </ul>
                                                </div>
                                                <!-- price-opt end-->                               
                                            </div>
                                            <!-- list-main-wrap-opt end-->
                                            <!-- listing-item-container -->
                                    <!--list-wrap-search end --> 
                                    @livewire('front.listing-item-component')             
                                    <!--col-list-wrap -->
                                    <!-- pagination end-->
                                        </div>
                                            
                                        <!-- list-main-wrap end-->
                                    </div>                                    



                                    
                                    <!--col-list-wrap end -->
                                </div>
                                <!--listing  end-->
                            </div>
                            <!--row end-->
                        </div>
                    </section>
                    @push('scripts')

<script>
    $(document).ready(function () {
        $('#sortby').select2();
        $('#sortby').on('change', function (e) {
            var item = $('#sortby').select2("val");
            @this.set('sortby', item);
        });
        // $('#location').select2();
        // $('#location').on('change', function (e) {
        //     var item = $('#location').select2("val");
        //     {{-- @this.set('viralSongs', item); --}}
        // });
    });

</script>

@endpush
