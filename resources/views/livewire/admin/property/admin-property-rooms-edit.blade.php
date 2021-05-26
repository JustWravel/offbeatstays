<div wire:ignore.self class="modal fade" id="editroom" tabindex="-1" role="dialog" aria-labelledby="editRoomModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rditRoomModalLabel">Edit Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data">
                <div class="form-group row">
                   
                    <div class="col-lg-12">
                        <label>Room Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Room name" value="" wire:model="rooms.name" />
                        <span class="form-text text-muted">Please enter property name</span>
                        {{-- @error('rooms.name') --}}
                    </div>
                    <div class="col-lg-12">
                        <label>Room Desciption (In Short):</label>
                        <textarea class="form-control" placeholder="Enter Room Description" wire:model="rooms.description" rows="5" id="roomdescription" ></textarea>
                        <span class="form-text text-muted">Please enter property name</span>
                    </div>
                    <div class="col-lg-12">
                        <label>Number Of Rooms:</label>
                        <input type="text" class="form-control" placeholder="Enter Number of rooms" value="" wire:model="rooms.number_of_rooms" />
                        <span class="form-text text-muted">Please enter number of rooms of this type</span>
                        {{-- @error('rooms.name') --}}
                    </div>
                    
                    
                    {{-- Rooms --}}
                    <div class="col-lg-12"><hr>
                        <p class="text-center"><br><strong>Room Price:</strong></p>
                    </div>
                    <div class="col-lg-6">
                        <label>Per Night:</label>
                        <input type="text" class="form-control" placeholder="Enter Room name" wire:model="rooms.cost_per_night" />
                        <span class="form-text text-muted">Please enter property room cost per night</span>
                    </div>
                    <div class="col-lg-6">
                        <label>Weekends:</label>
                        <input type="text" class="form-control" placeholder="Enter Room name" wire:model="rooms.cost_per_night_weekend" />
                        <span class="form-text text-muted">Please enter property room cost per night on weekend</span>
                    </div>
                    <div class="col-lg-6">
                        <label>Weekly (7 days):</label>
                        <input type="text" class="form-control" placeholder="Enter Room name" wire:model="rooms.cost_per_night_weekly" />
                        <span class="form-text text-muted">Please enter property room cost per night for a week(7 days)</span>
                    </div>
                    <div class="col-lg-6">
                        <label>Fortnight (15 days):</label>
                        <input type="text" class="form-control" placeholder="Enter Room name" wire:model="rooms.cost_per_night_fortnightly" />
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
                        <span class="form-text text-muted">Please enter extra person cost if allowed.</span>
                    </div>

                    <div class="col-lg-6">
                        <label>Breakfast Included:</label>
                        <input type="checkbox" class="form-control" placeholder="Upload room Image" wire:model="rooms.breakfast_included" />
                        <span class="form-text text-muted">Check if breakfast is included in cost</span>
                    </div>
                    <div class="col-lg-12"><hr>
                        <p class="text-center"><br><strong>Image:</strong></p>
                    </div>
                    <div class="col-lg-6">

                        <label>Room Images:</label>
                        <img src="{{$room_image}}" height="150" alt="" class="img-thumbnail">
                        <input type="file" multiple class="form-control" wire:model="rooms.room_image"/>
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
                    </div> --}}
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-dark font-weight-bold" wire:click="updateRoom">Save</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>

</script>
@endpush