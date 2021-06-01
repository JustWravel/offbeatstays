<div>
    <!-- listing-item-container -->
                                            <div class="listing-item-container init-grid-items fl-wrap" style="margin-top: 0">
                                                @foreach($properties as $property)
                                                    <!-- listing-item  -->
                                                    <div class="listing-item">
                                                        <article class="geodir-category-listing fl-wrap">
                                                            <div class="geodir-category-img">
                                                                <a href="{{ route('front.property.show', ['state'=> $property->state->slug, 'location'=> $property->location->slug, 'category'=> $property->category->slug, 'slug'=> $property->slug])}}"><img src="{{ asset( $property->images[0]->name ?? 'front-assets/images/gal/1.jpg') }}" alt=""></a>
                                                                {{-- <div class="listing-avatar"><a href=""><img src="images/avatar/1.jpg" alt=""></a>
                                                                    <span class="avatar-tooltip">Added By  <strong>Alisa Noory</strong></span>
                                                                </div> --}}
                                                                <div class="sale-window" style="background: {{$property->category->color}}">{{$property->category->name}}</div>
                                                                <div class="geodir-category-opt">
                                                                    {{-- <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                                    <div class="rate-class-name">
                                                                        <div class="score"><strong>Very Good</strong>27 Reviews </div>
                                                                        <span>5.0</span>                                             
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                                <div class="geodir-category-content-title fl-wrap">
                                                                    <div class="geodir-category-content-title-item">
                                                                        <h3 class="title-sin_map"><a href="{{ route('front.property.show', ['state'=> $property->state->slug, 'location'=> $property->location->slug, 'category'=> $property->category->slug, 'slug'=> $property->slug])}}">{{ $property->name }}</a></h3>
                                                                        <div class="geodir-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i> {{ $property->location->name .', '.$property->state->name.', India'}}</a></div>
                                                                    </div>
                                                                </div>
                                                                <div style="width: 100%;display: inline-block;height: 40px; overflow-y: hidden;">{!! $property->description !!}</div>
                                                                <ul class="facilities-list fl-wrap">
                                                                    @forelse(json_decode($property->amenities) as $amenity)
                                                                        {{-- {{$amenity->name}} --}}
                                                                        <li><i class="{{$amenity->iconclass}}"></i><span>{{$amenity->name}}</span></li>
                                                                    @empty
                                                                        <li><i class="fas fa-bed"></i><span></span></li>
                                                                    @endforelse
                                                                    
                                                                </ul>
                                                                <div class="geodir-category-footer fl-wrap">
                                                                    <div class="geodir-category-price"> <span><i class="fas fa-rupee-icon"></i>{{$property->price}}</span> /Night</div>
                                                                    <div class="geodir-opt-list">
                                                                        <a href="#" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map</span></a>
                                                                        {{-- <a href="#" class="geodir-js-favorite"><i class="fal fa-heart"></i><span class="geodir-opt-tooltip">Save</span></a> --}}
                                                                        {{-- <a href="#" class="geodir-js-booking"><i class="fal fa-exchange"></i><span class="geodir-opt-tooltip">Find Directions</span></a> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                    <!-- listing-item end -->
                                               
                                                @endforeach                               
                                            </div>
                                            <!-- listing-item-container end-->
                                            {{-- <button type="button" class="btn btn-primary" wire:click.prevent="loadMore" >Load more <i class="fal fa-spinner"></i> </button> --}}
                                             {{-- {{ $properties->links() }} --}}
</div>
