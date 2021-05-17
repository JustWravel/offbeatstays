<div class="form-group row">
    
    <div class="col-lg-6 " wire:ignore>
		<label>Select State:</label>
		<select class="form-control select2" id="state_id" name="state_id" wire:model="selectedState">
			<option value="">Select a State</option>
			@foreach($states as $state)
				<option value="{{ $state->id }}" {{ (old('state_id') == $state->id ) ? 'selected' : '' }}>{{ $state->name }}</option>
			@endforeach
		</select>
		<span class="form-text text-muted">Please select a state</span>
	</div>
	{{-- {{$selectedLocation}} --}}
    @if (!is_null($selectedState))
        
        <div class="col-lg-6 " >
			<label>Select Location:</label>
			<select class="form-control select2" id="location_id" name="location_id" wire:model="selectedLocation" placeholder="Please Select Location" >
				<option value="">Select a Location</option>
				@foreach($locations as $location)
					<option value="{{ $location->id }}" {{ ($selectedLocation == $location->id ) ? 'selected' : '' }}>{{ $location->name }}</option>
				@endforeach
			</select>
			<span class="form-text text-muted">Please select a state</span>
		</div>
	@else
		<div class="col-lg-6 " >
			<label>Select Location:</label>
			<select class="form-control select2" id="location_id" name="location_id" wire:model="selectedLocation" placeholder="Please Select Location">
				<option value="">Select State First</option>
				@foreach($locations as $location)
					<option value="{{ $location->id }}" {{ (old('location_id') == $location->id ) ? 'selected' : '' }}>{{ $location->name }}</option>
				@endforeach
			</select>
			<span class="form-text text-muted">Please select a state</span>
		</div>
    @endif
</div>


@push('scripts')

<script>
    $(document).ready(function () {
    	
        $('#state_id').select2({
            		placeholder: 'Select State'
            	});
        $('#location_id').select2({
            		placeholder: 'Select Location'
            	});
        
        $('#state_id').on('change', function (e) {
            var data = $('#state_id').select2("val");
            @this.set('selectedState', data);
            // ckeditor(ckeditorid);
            setTimeout( function (){
            	$('#location_id').select2({
            		placeholder: 'Select Location'
            	});
            }, 500);

        });
        });
</script>
@endpush