<section class="parallax-section single-par" data-scrollax-parent="true">
                        <div class="bg par-elem "  data-bg="{{ $state?->image ?? $location?->state?->image ?? $category?->image}}" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title center-align big-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2><span>{{ $category?->name ?? 'Stays'}} in {{ $state?->name ?? $location?->name ?? 'India' }}</span></h2>
                                <span class="section-separator"></span>
                                {{-- <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit amet fermentum sem.</h4> --}}
                            </div>
                        </div>
                        {{-- <div class="header-sec-link">
                            <div class="container"><a href="#sec1" class="custom-scroll-link color-bg"><i class="fal fa-angle-double-down"></i></a></div>
                        </div> --}}
                    </section>
                    <!--  section  end-->
                    <div class="breadcrumbs-fs fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs fl-wrap"><a href="#">Home</a><a href="#">Search</a><span>{{ $category?->name ?? 'Stays'}} & {{ $state?->name ?? 'India' }}</span></div>
                        </div>
                    </div>
                    <!--section -->
                    <section class="grey-blue-bg small-padding" id="sec1">
                        <div class="container">
                            <div class="row">
                                <!--listing -->
                                <div class="col-md-4">
                                    @livewire('front.front-listing-left-sidebar-search-filter-component', [
                                        'price_min' => 1420,
                                        'price_max' => 1520
                                        ])
                                    
                                </div>
                                <div class="col-md-8">
                                    <div class="mobile-list-controls fl-wrap mar-bot-cont">
                                        <div class="mlc show-list-wrap-search fl-wrap"><i class="fal fa-filter"></i> Filter</div>
                                    </div>
                                    <!--list-wrap-search   -->
                                    
                                    <div class="col-list-wrap fw-col-list-wrap">
                                        <!-- list-main-wrap-->
                                        <div class="list-main-wrap fl-wrap card-listing">
                                            <!-- list-main-wrap-opt-->
                                            <div class="list-main-wrap-opt fl-wrap">
                                                <div class="list-main-wrap-title fl-wrap col-title">
                                                    <h2>Results For : <span>{{ $category?->name ?? 'Stays'}} in {{ $state?->name ?? $location?->name ?? 'India' }} </span></h2>
                                                </div>
                                                <!-- price-opt-->
                                                {{-- <div class="price-opt">
                                                    <span class="price-opt-title">Sort results by:</span>
                                                    <div class="listsearch-input-item">
                                                        <select data-placeholder="Popularity" wire:model="sortby" id="sortby" >
                                                            
                                                            <option value="priceasc">Price: low to high</option>
                                                            <option value="pricedesc">Price: high to low</option>
                                                        </select>
                                                    </div>
                                                </div> --}}
                                                <!-- price-opt end-->
                                                <!-- price-opt-->
                                                {{-- <div class="grid-opt">
                                                    <ul>
                                                        <li><span class="two-col-grid act-grid-opt"><i class="fas fa-th-large"></i></span></li>
                                                        <li><span class="one-col-grid"><i class="fas fa-bars"></i></span></li>
                                                    </ul>
                                                </div> --}}
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
