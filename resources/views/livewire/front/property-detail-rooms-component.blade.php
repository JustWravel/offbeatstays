<div>

	@include('livewire.front.property-detail-room-detail-component', ['room_id' => $room_id] )
	
    <div class="list-single-main-item fl-wrap" id="sec4">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>Available Rooms</h3>
                                            </div>
                                            <!--   rooms-container -->
                                            <div class="rooms-container fl-wrap">
                                                @foreach($property->rooms as $roomIndex => $room)
                                                <!--  rooms-item -->
                                                <div class="rooms-item fl-wrap">
                                                    <div class="rooms-media">
                                                    	@php
                                                    	$roomimagearray = array();
                                                    	foreach (json_decode($room->image) as $key => $value) {
                                                    		array_push($roomimagearray, (object)array('src'=>$value));
                                                    	}
                                                    	@endphp
                                                    	
                                                    	
                                                        <img src="{{ asset(@json_decode($room->image)[0] ?? 'front-assets/images/gal/1.jpg')}}" alt="">
                                                        <div class="dynamic-gal more-photos-button" data-dynamicPath="{{json_encode($roomimagearray)}}">  View Gallery <span>{{count(json_decode($room->image))}} photos</span> <i class="far fa-long-arrow-right"></i></div>
                                                    </div>
                                                    <div class="rooms-details">
                                                        <div class="rooms-details-header fl-wrap">
                                                            <span class="rooms-price"><span class="fal fas far fa-rupee-sign"></span> {{ $room->cost_per_night }}<strong> / person</strong></span>
                                                            <h3>{{$room->name}}</h3>
                                                            <h5>Max Guests: <span>3 persons</span></h5>
                                                        </div>
                                                        {{-- <p>Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> --}}
                                                        <p>{{$room->description}}</p>
                                                        <div class="facilities-list fl-wrap">
                                                        	<ul>
                                                            	@foreach($room->amenities as $amenity)
                                                            	
                                                            		<li><i class="{{$amenity->iconclass}}"></i> <span>{{$amenity->name}}</span> </li>
                                                            	@endforeach
                                                            </ul>
                                                            
                                                            <a href="#" class="btn color-bg ajax-link" wire:ignore wire:click.prevent=roomDetail({{$roomIndex}})>Details<i class="fas fa-caret-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--  rooms-item end -->
                                                @endforeach
                                                                                                      
                                            </div>
                                            <!--   rooms-container end -->
                                        </div>
</div>
