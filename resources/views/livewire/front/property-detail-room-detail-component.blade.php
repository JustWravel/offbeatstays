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
                                <i class="fal fa-user-alt"></i>
                                <h5><span>3</span> Persons</h5>
                            </li>
                            <li>
                                <i class="fal fa-chalkboard"></i>
                                <h5><span>52</span> Ft²</h5>
                            </li>
                            <li>
                                <i class="fal fa-bath"></i>
                                <h5><span>1</span> Bathroom</h5>
                            </li>
                            <li>
                                <i class="fal fa-hand-holding-usd"></i>
                                <h5><span>81$</span> / Per Night</h5>
                            </li>
                        </ul>
                    </div>
                    <div class="ajax-modal-details fl-wrap">
                        <!--ajax-modal-details-box-->
                        <div class="ajax-modal-details-box">
                            <h3>Details</h3>
                            <p>{{@$property->rooms[$room_id]->description}}</p>
                        </div>

                        <div class="ajax-modal-details-box">
                            <h3>Price</h3>

                            <div class="table-responsive">
                                <table class="table">
                                    <caption>Price Per Night</caption>
                                    <thead>
                                        <tr>
                                            <th>Basis</th>
                                            <th>Nightly</th>
                                            <th>On Weekend</th>
                                            <th>Weekly</th>
                                            <th>Fortnightly</th>
                                            <th>Monthly</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Price</th>
                                            <td>{{@$property->rooms[$room_id]->cost_per_night}}</td>
                                            <td>{{@$property->rooms[$room_id]->cost_per_night_weekend}}</td>
                                            <td>{{@$property->rooms[$room_id]->cost_per_night_weekly}}</td>
                                            <td>{{@$property->rooms[$room_id]->cost_per_night_fortnightly}}</td>
                                            <td>{{@$property->rooms[$room_id]->cost_per_night_monthly}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
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
