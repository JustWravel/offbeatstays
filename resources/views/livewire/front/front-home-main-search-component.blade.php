<div class="main-search-input-wrap">
    <div class="main-search-input fl-wrap">
    	<form action="search">
    	<div wire:ignore class="main-search-input-item">
		    <select class="form-control" id="category" name="stay_type">
		        <option value="">StayType</option>
		        @foreach($categories as $category)
		        <option value="{{ $category->slug }}">{{ $category->name }}</option>
		        @endforeach
		    </select>
		</div>
    	<div wire:ignore class="main-search-input-item">
		    <select class="form-control" id="location"  name="stay_location">
		        <option value="">Location</option>
		        @foreach($states as $state)
		        <optgroup label="{{ $state->name }}">
		        	<option value="{{ $state->slug }}"> All {{ $state->name }}</option>
			        	@foreach($state->locations as $location)
			        
			        	<option value="{{ $location->slug }}">{{ $location->name }}</option>
		       
		        
		        		@endforeach
		        </optgroup>
		        
		        @endforeach
		    </select>
		</div>
		<style>
			.select2-container--default .select2-results__group {
    cursor: default;
    display: block;
    padding: 6px;
    text-transform: uppercase;
    color: #fff;
    background: #18458b;
    padding: 10px 30px;
    font-style: italic;
    text-align: justify;
}
		</style>
                                        {{-- <div class="main-search-input-item location" id="autocomplete-container">
                                            <span class="inpt_dec"><i class="fal fa-map-marker"></i></span>
                                            <input type="text" placeholder="Hotel , City..." class="autocomplete-input" id="autocompleteid2"  value=""/>
                                            <a href="#"><i class="fal fa-dot-circle"></i></a>
                                        </div>
                                        <div class="main-search-input-item main-date-parent main-search-input-item_small">
                                            <span class="inpt_dec"><i class="fal fa-calendar-check"></i></span> <input type="text" placeholder="When" name="main-input-search"   value=""/>
                                        </div> --}}
                                        {{-- <div class="main-search-input-item">
                                            <div class="qty-dropdown fl-wrap">
                                                <div class="qty-dropdown-header fl-wrap"><i class="fal fa-users"></i> Persons</div>
                                                <div class="qty-dropdown-content fl-wrap">
                                                    <div class="quantity-item">
                                                        <label><i class="fas fa-male"></i> Adults</label>
                                                        <div class="quantity">
                                                            <input type="number" min="1" max="3" step="1" value="1">
                                                        </div>
                                                    </div>
                                                    <div class="quantity-item">
                                                        <label><i class="fas fa-child"></i> Children</label>
                                                        <div class="quantity">
                                                            <input type="number" min="0" max="3" step="1" value="0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <button type="submit" class="main-search-button color2-bg" >Search <i class="fal fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>

    @push('scripts')

<script>
    $(document).ready(function () {
        $('#category').select2();
        $('#category').on('change', function (e) {
            // var item = $('#category').select2("val");
            {{-- @this.set('viralSongs', item); --}}
        });
        $('#location').select2();
        $('#location').on('change', function (e) {
            // var item = $('#location').select2("val");
            {{-- @this.set('viralSongs', item); --}}
        });
    });

</script>

@endpush