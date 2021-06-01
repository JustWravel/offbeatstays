<div>
    @if(isset($property->rooms[$room_id]))
    @php
                                                        $roomimagearray = array();
                                                        foreach ((array)json_decode($property->rooms[$room_id]->image) as $key => $value) {
                                                            array_push($roomimagearray, (object)array('src'=>$value));
                                                        }
                                                        @endphp
        <div id="ajax-modal" class="fl-wrap" style="display: none;" >
            <!--ajax-modal-wrap -->
            <div class="ajax-modal-wrap fl-wrap" style="">
                <div class="ajax-modal-close"><i class="fal fa-times"></i></div>
                <!--ajax-modal-item-->
                <div class="ajax-modal-item fl-wrap">
                    <div class="ajax-modal-media fl-wrap">
                        <img src="{{ json_decode($property->rooms[$room_id]->image)[0] ?? asset('front-assets/images/gal/1.jpg')}}" alt="{{json_decode($property->rooms[$room_id]->image)[0]}}">
                        <div class="ajax-modal-title">
                            <div class="section-title-separator"><span></span></div>
                            {{@$property->rooms[$room_id]->name}}
                        </div>
                        <div class="ajax-modal-photos-btn dynamic-gal" data-dynamicPath="{{json_encode($roomimagearray)}}">Photos (<span>{{count($roomimagearray)}}</span>)</div>
                    </div>
                    <div class="ajax-modal-list fl-wrap">
                        <ul>
                            <li>
                                <i class="fal fa-house-user"></i>
                                <h5><span>{{$property->rooms[$room_id]->number_of_rooms}}</span> Rooms</h5>
                            </li>
                            <li>
                                <i class="fal fa-bed"></i>
                                <h5><span>2 + 1 </span> Beds</h5>
                            </li>
                            <li>
                                <i class="fal fa-utensils-alt"></i>
                                <h5><span>Breakfast</span> Included</h5>
                            </li>
                            <li>
                                <i class="fal fa-bath"></i>
                                <h5><span>1</span> Bathroom</h5>
                            </li>
                        </ul>
                    </div>
                    <div class="ajax-modal-details fl-wrap">
                        <!--ajax-modal-details-box-->
                        <div class="ajax-modal-details-box">
                            <h3>Details</h3>
                            <p>{{@$property->rooms[$room_id]->description}}</p>
                        </div>
<style type="text/css">
    /* Create two equal columns that floats next to each other */
.column {
float: left;
    width: 50%;
    padding: 10px;
    border: 1px solid #eee;
    background: #0e2952;
    color: #fff;
  
}
.column p{
        font-size: 16px;
    line-height: 16px;
    padding: 4px;
    font-weight: 700;
    color: #fff;
}

/* Clear floats after the columns */
.row1:after {
  content: "";
  display: table;
  clear: both;
}
</style>
                        <div class="ajax-modal-details-box">
                            <h3>Price</h3>
                            @if($property->rooms[$room_id]->cost_per_night)
                            <div class="row1">
                              <div class="column column-parameter">
                                <p>Booking Basis</p>
                              </div>
                              <div class="column column-value">
                                <p>Price /Room /Night</p>
                              </div>
                            </div>
                            @endif
                            @if(@$property->rooms[$room_id]->cost_per_night)
                            <div class="row1">
                              <div class="column column-parameter">
                                <p>Nightly</p>
                              </div>
                              <div class="column column-value">
                                <p><i class="fal fa-rupee-sign"></i> {{@$property->rooms[$room_id]->cost_per_night ?? 0}}</p>
                              </div>
                            </div>
                            @endif
                            @if(@$property->rooms[$room_id]->cost_per_night_weekend)
                            <div class="row1">
                              <div class="column column-parameter">
                                <p>On Weekend</p>
                              </div>
                              <div class="column column-value">
                                <p>{{@$property->rooms[$room_id]->cost_per_night_weekend ?? 0}}</p>
                              </div>
                            </div>
                            @endif
                            @if(@$property->rooms[$room_id]->cost_per_night_weekly)
                            <div class="row1">
                              <div class="column column-parameter">
                                <p>Weekly</p>
                              </div>
                              <div class="column column-value">
                                <p>{{@$property->rooms[$room_id]->cost_per_night_weekly ?? 0}}</p>
                              </div>
                            </div>
                            @endif
                            @if(@$property->rooms[$room_id]->cost_per_night_fortnightly)
                            <div class="row1">
                              <div class="column column-parameter">
                                <p>Fortnightly</p>
                              </div>
                              <div class="column column-value">
                                <p>{{@$property->rooms[$room_id]->cost_per_night_fortnightly ?? 0}}</p>
                              </div>
                            </div>
                            @endif
                            @if(@$property->rooms[$room_id]->cost_per_night_monthly)
                            <div class="row1">
                              <div class="column column-parameter">
                                <p>Monthly</p>
                              </div>
                              <div class="column column-value">
                                <p>{{@$property->rooms[$room_id]->cost_per_night_monthly ?? 0}}</p>
                              </div>
                            </div>
                            @endif
                            @if(@$property->rooms[$room_id]->extra_person_cost)
                            <div class="row1">
                              <div class="column column-parameter">
                                <p>Extra Person</p>
                              </div>
                              <div class="column column-value">
                                <p>{{@$property->rooms[$room_id]->extra_person_cost}}</p>
                              </div>
                            </div>
                            @endif

                            
                        </div>
                        <!--ajax-modal-details-box end-->
                        <!--ajax-modal-details-box-->
                        <div class="ajax-modal-details-box">
                            <h3>Room Amenities</h3>
                            <div class="listing-features fl-wrap">
                                <ul>
                                    @foreach($property->rooms[$room_id]->amenities as $amenity)
                                        <li><i class="{{$amenity->iconclass}}"></i>  {{$amenity->name}} </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--ajax-modal-details-box end-->
                        <a href="#" class="btn float-btn color2-bg">Book Now<i class="fas fa-caret-right"></i></a>                            
                    </div>
                </div>
                <!--ajax-modal-item-->
            </div>
            <!--ajax-modal-wrap end -->
        </div>
        <!--ajax-modal-container end -->
        @endif
    
</div>
