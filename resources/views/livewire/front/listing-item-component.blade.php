<div>
                                            <div class="listing-item-container init-grid-items fl-wrap two-columns-grid">
                                                <!-- listing-item  -->
                                                @foreach($properties as $property)
    											<div class="listing-item">
                                                    <article class="geodir-category-listing fl-wrap">
                                                        <div class="geodir-category-img">
                                                            <a href="{{ route('front.property.show', ['state'=> $property->state->slug, 'location'=> $property->location->slug, 'category'=> $property->category->slug, 'slug'=> $property->slug])}}"><img src="{{ $property->images?->first()?->media?->getUrl('card') ?? asset('front-assets/images/gal/1.jpg')}}" alt=""></a>
                                                            {{-- <div class="listing-avatar"><a href="author-single.html"><img src="images/avatar/1.jpg" alt=""></a>
                                                                <span class="avatar-tooltip">Added By  <strong>Alisa Noory</strong></span>
                                                            </div> --}}
                                                            <div class="sale-window" style="background: {{$property->category->color}}">{{$property->category->name}}</div>
                                                            <div class="geodir-category-opt">
                                                                {{-- <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div> --}}
                                                                {{-- <div class="rate-class-name">
                                                                    <div class="score"><strong>Very Good</strong>27 Reviews </div>
                                                                    <span>5.0</span>                                             
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                        <div class="geodir-category-content fl-wrap title-sin_item">
                                                            <div class="geodir-category-content-title fl-wrap">
                                                                <div class="geodir-category-content-title-item">
                                                                    <h3 class="title-sin_map"><a href="{{ route('front.property.show', ['state'=> $property->state->slug, 'location'=> $property->location->slug, 'category'=> $property->category->slug, 'slug'=> $property->slug])}}">{{$property->name}}</a></h3>
                                                                    <div class="geodir-category-location fl-wrap"><a href="{{ route('front.property.show', ['state'=> $property->state->slug, 'location'=> $property->location->slug, 'category'=> $property->category->slug, 'slug'=> $property->slug])}}" class="map-item"><i class="fas fa-map-marker-alt"></i> {{$property->location->name}}, {{$property->state->name}}</a></div>
                                                                </div>
                                                            </div>

                                                            <div style="text-align: justify;">
                                                            	{{ html_entity_decode(substr(strip_tags($property->description), 0, 100)) }}
                                                            </div>
                                                            <ul class="facilities-list fl-wrap">
                                                            	@forelse($property->amenities as $amenity)
                                                            		<li><i class="{{$amenity->iconclass}}"></i><span>{{$amenity->name}}</span></li>
                                                            	@empty
                                                            		<li><i class="fal fa-"></i><span></span></li>
                                                            	@endforelse
                                                            	
                                                            </ul>
                                                            <div class="geodir-category-footer fl-wrap">
                                                                <div class="geodir-category-price"><span> <i class="fal fas far fa-rupee-sign"></i> {{$property->price}}</span> /Night </div>
                                                                {{-- <div class="geodir-opt-list">
                                                                    <a href="#Detail" class="single-map-item" style="background: green" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fab fa-whatsapp" style="color:#fff"></i><span class="geodir-opt-tooltip">On the map</span></a>
                                                                    <a href="#" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map</span></a>
                                                                    <a href="#" class="geodir-js-favorite"><i class="fal fa-heart"></i><span class="geodir-opt-tooltip">Save</span></a>
                                                                    <a href="#" class="geodir-js-booking"><i class="fal fa-exchange"></i><span class="geodir-opt-tooltip">Find Directions</span></a>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
    											@endforeach
                                                <!-- listing-item end -->                        
                                            </div>
                                            <!-- listing-item-container end-->
                                            <!-- pagination-->
                                            {{-- {{ $properties->links('livewire.front.pagination-links-view') }} --}}
                                            
                                            </div>