<div wire:ignore.self class="modal fade" id="addroom" tabindex="-1" role="dialog" aria-labelledby="addRoomModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoomModalLabel">Add Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-group row">
                   
                    <div class="col-lg-12">
                        <label>Room Name:</label>
                        <input type="text" class="form-control @error('rooms.name') is-invalid @enderror" placeholder="Enter Room name" value="" wire:model="rooms.name"/>
                        @error('rooms.name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <span class="form-text text-muted">Please enter property name</span>

                    </div>
                    <div class="col-lg-12">
                        <label>Room Desciption (In Short):</label>
                        <textarea class="form-control @error('rooms.description') is-invalid @enderror" placeholder="Enter Room Description" wire:model="rooms.description" rows="5" id="roomdescription" ></textarea>
                        @error('rooms.description')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <span class="form-text text-muted">Please enter property name</span>
                    </div>
                    <div class="col-lg-12">
                        <label>Number Of Rooms:</label>
                        <input type="text" class="form-control @error('rooms.number_of_rooms') is-invalid @enderror" placeholder="Enter Number of rooms" value="" wire:model="rooms.number_of_rooms" />
                        @error('rooms.number_of_rooms')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <span class="form-text text-muted">Please enter number of rooms of this type</span>
                        {{-- @error('rooms.name') --}}
                    </div>
                    
                    {{-- Rooms --}}
                    <div class="col-lg-12"><hr>
                        <p class="text-center"><br><strong>Room Price:</strong></p>
                    </div>
                    <div class="col-lg-6">
                        <label>Per Night:</label>
                        <input type="text" class="form-control @error('rooms.cost_per_night') is-invalid @enderror" placeholder="Enter Room name" wire:model="rooms.cost_per_night" />
                        @error('rooms.cost_per_night')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <span class="form-text text-muted">Please enter property room cost per night</span>
                    </div>
                    <div class="col-lg-6">
                        <label>Weekends:</label>
                        <input type="text" class="form-control @error('rooms.cost_per_night_weekend') is-invalid @enderror" placeholder="Enter Room name" wire:model="rooms.cost_per_night_weekend" />
                        @error('rooms.cost_per_night_weekend')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <span class="form-text text-muted">Please enter property room cost per night on weekend</span>
                    </div>
                    <div class="col-lg-6">
                        <label>Weekly (7 days):</label>
                        <input type="text" class="form-control" placeholder="Enter Room name" wire:model="rooms.cost_per_night_weekly" />
                        @error('rooms.description')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <span class="form-text text-muted">Please enter property room cost per night for a week(7 days)</span>
                    </div>
                    <div class="col-lg-6">
                        <label>Fortnight (15 days):</label>
                        <input type="text" class="form-control" placeholder="Enter Room name" wire:model="rooms.cost_per_night_fortnightly" />
                        @error('rooms.description')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <span class="form-text text-muted">Please enter property room cost per night for a fortnightly(15 days)</span>
                    </div>
                    <div class="col-lg-6">
                        <label>Monthly (30 days):</label>
                        <input type="text" class="form-control" placeholder="Enter Room name" wire:model="rooms.cost_per_night_monthly" />
                        <span class="form-text text-muted">Please enter property room cost per night for a month(30 days)</span>
                    </div>
                    <div class="col-lg-6">
                        <label>Extra Person cost ( if allowed ):</label>
                        <input type="text" class="form-control" placeholder="Enter Room name" wire:model="rooms.extra_person_cost" />
                        @error('rooms.description')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <span class="form-text text-muted">Please enter extra person cost if allowed.</span>
                    </div>

                    <div class="col-lg-6">
                        <label>Breakfast Included:</label>
                        <input type="checkbox" class="form-control"  wire:model="rooms.breakfast_included" /> 
                        @error('rooms.description')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <span class="form-text text-muted">Check if breakfast is included in cost</span>
                    </div>
                    <div class="col-lg-12"><hr>
                        <p class="text-center"><br><strong>Image:</strong></p>
                    </div>
                    <div class="col-lg-6">

                        <label>Room Images:</label>
                        <img src="{{$room_image}}" height="150" alt="" class="img-thumbnail">
                        <input type="file" multiple class="form-control" wire:model="rooms.room_image"/>
                        @error('rooms.description')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <span class="form-text text-muted">Please upload property room image</span>
                    </div>

                    {{-- Meals --}}
                    <div class="col-lg-12"><hr>
                        <p class="text-center"><br><strong>Room Amenitities:</strong></p>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-form-label">Room Amenity</label>
                        <div class="col-12 col-form-label">
                            <div class="checkbox-inline">
                                @foreach($amenities as $amenity)
                                <label class="checkbox checkbox-outline checkbox-success">
                                    <input type="checkbox" name="Checkboxes15" value="{{ $amenity->id }}" wire:model="rooms.amenity.{{ $amenity->id }}" />
                                    <span></span>
                                    <i class="fal fas far fa-{{$amenity->iconclass}}"></i> &nbsp; {{$amenity->name}}
                                </label>
                                @endforeach
                                
                            </div>
                            <span class="form-text text-muted">Some help text goes here</span>
                        </div>
                    </div>
                    {{-- <div class="col-lg-12">
                        <label>Room Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Room name" wire:model="rooms.name" />
                        <span class="form-text text-muted">Please enter property name</span>
                    </div>
                    <div class="col-lg-12">
                        <label>Room Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Room name" wire:model="rooms.name" />
                        <span class="form-text text-muted">Please enter property name</span>
                    </div> --}}
                    @if ($errors->any())
                                                                <div class="alert alert-danger">
                                                                    Something wrong. Please check input fields above.
                                                                 </div>
                                                            @endif
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold" wire:click="addRoom">Add Room</button>
            </div>
        </div>
    </div>
</div>