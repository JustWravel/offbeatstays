<div wire:ignore.self class="modal fade" id="addroom" tabindex="-1" role="dialog" aria-labelledby="addRoomModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                        <input type="text" class="form-control" placeholder="Enter Room name" wire:model="rooms.name" />
                        <span class="form-text text-muted">Please enter property name</span>
                        {{-- @error('rooms.name') --}}
                    </div>
                    <div class="col-lg-12">
                        <label>Room Desciption (In Short):</label>
                        <textarea class="form-control" placeholder="Enter Room Description" wire:model="rooms.description" ></textarea>
                        <span class="form-text text-muted">Please enter property name</span>
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