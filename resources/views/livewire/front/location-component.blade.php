@section('meta_title', 'Best Offbeat Properties '.$location->name.' '.$location->state->name.' - OffbeatStays')
                    @section('meta_description', 'A List of all Properties in '.$location->name.' that are a part of OffbeatStays. Looking for offbeat stays in '.$location->name.' at offbeat locations? your search ends here!')
                    @section('meta_keywords', 'offbeatstays '.$location->name.', best properties '.$location->name.', long stays '.$location->name.', work from mountain properties '.$location->name.', staycations '.$location->name.', Leisure Stays '.$location->name.', best stays '.$location->name.', worckations '.$location->name)
                    @section('meta_image', asset($location->image ?? 'front-assets/images/bg/1.jpg'))

                    <section class="parallax-section single-par" data-scrollax-parent="true">
                        <div class="bg par-elem "  data-bg="{{ asset($location->image ?? 'front-assets/images/bg/location.jpg') }}" style="background-image: url('{{ asset($location->image ?? 'front-assets/images/bg/1.jpg') }}')" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title center-align big-title">
                                {{-- <div class="section-title-separator"><span></span></div> --}}
                                <h2><span>{{ $location->name}}</span></h2>
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
                            <div class="breadcrumbs fl-wrap"><a href="{{ route('front.home') }}">Home</a><a href="{{ route('front.state.all') }}">India</a><a href="{{ route('front.state.show', ['slug'=>$location->state->slug]) }}">{{ $location->state->name }}</a><span>{{ $location->name }}</span></div>
                        </div>
                    </div>
                    <!--  section-->
                    <section class="grey-blue-bg small-padding" id="sec1">
                        <div class="container">
                            <div class="row">
                                <!--filter sidebar -->
                                <div class="col-md-4">
                                    @livewire('front.front-listing-left-sidebar-search-filter-component', [
                                        'price_min' => 1420,
                                        'price_max' => 1520
                                        ])
                                    
                                </div>
                                <!--filter sidebar end-->
                                <!--listing -->
                                <div class="col-md-8">
                                    <!--col-list-wrap -->
                                    <div class="col-list-wrap fw-col-list-wrap post-container">
                                        <!-- list-main-wrap-->
                                        <div class="list-main-wrap fl-wrap card-listing">
                                            <!-- list-main-wrap-opt-->
                                            {{-- <div class="list-main-wrap-opt fl-wrap">
                                                
                                                <!-- price-opt-->
                                                <div class="price-opt">
                                                    <span class="price-opt-title">Sort results by:</span>
                                                    <div class="listsearch-input-item">
                                                        <select data-placeholder="Popularity" class="chosen-select no-search-select" >
                                                            <option>Popularity</option>
                                                            <option>Average rating</option>
                                                            <option>Price: low to high</option>
                                                            <option>Price: high to low</option>
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
                                            </div> --}}
                                            <!-- list-main-wrap-opt end-->
                                            {{-- {{ $slug}} --}}
                                            @livewire('front.location-item-component', [
                                                    'slug'=>$slug
                                                ])
                                        </div>
                                        <!-- list-main-wrap end-->
                                    </div>
                                    <!--col-list-wrap end -->
                                </div>
                                <!--listing  end-->
                                

                            </div>
                            <!--row end-->
                        </div>
                        <div class="limit-box fl-wrap"></div>
                    </section>

                    

