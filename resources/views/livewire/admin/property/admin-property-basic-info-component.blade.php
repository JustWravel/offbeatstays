<div class="card card-custom gutter-b example example-compact">
											<div class="card-header">
												<h3 class="card-title">Edit Property</h3>
												<div class="card-toolbar">
													{{-- <div class="example-tools justify-content-center">
														<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
														<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
													</div> --}}
												</div>
											</div>
											<!--begin::Form-->
											<form class="form" wire:submit.prevent="save" action="{{ route('admin.property.update', ['property' => $property->id]) }}" method="post" enctype="multipart/form-data">
												<div class="card-body">
													<div class="row">
														<div class="col-lg-8 offset-lg-2">
															@if ($errors->any())
															    <div class="alert alert-danger">
															     	<ul>
															     		@foreach ($errors->all() as $error)
															     		 	<li>{{ $error }}</li>
															             @endforeach
															         </ul>
															     </div>
															@endif
														</div>
													</div>
													{{-- @method('PUT')
													@csrf --}}
													<div class="form-group row" wire:ignore>
														<div class="col-lg-12">
															<label>Property Name:</label>
															<input type="text" class="form-control" placeholder="Enter property name" name="name" value="" wire:model="name" />
															<span class="form-text text-muted">Please enter property name</span>
														</div>

														<div class="col-lg-12">
															<label>Description:</label>
															<textarea class="form-control" placeholder="Enter property Description" name="description" id="description" wire:model="description">{{$description}}</textarea>
															<span class="form-text text-muted">Please enter property description</span>
														</div>
													</div>
													

														{{-- @livewire('admin.state-locations-component',['selectedLocation'=>$selectedLocation])
														 --}}
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

													<div class="form-group row">
														
														<div class="col-lg-6">
															<label>Select Category:</label>
															<select class="form-control select2" id="category" name="category_id" wire:model="selectedCategory">
																<option value="">Select a Category</option>
																@foreach($categories as $category)
																	<option value="{{ $category->id }}" {{ (old('category_id') ?? $property->category_id == $category->id ) ? 'selected' : '' }}>{{ $category->name }}</option>
																@endforeach
															</select>
															<span class="form-text text-muted">Please select a parent state</span>
														</div>
													</div>
													<br>
													<hr/>
													<div class="form-group row">
														<div class="col-lg-6 offset-lg-3">
															<p class="text-center"><strong>SEO</strong></p>
														</div>
														<div class="col-lg-6 offset-lg-3">
															<label>Meta Title:</label>
															<input type="text" class="form-control" placeholder="Enter property name" name="meta_title" value="{{ old('meta_title') ?? $property->meta_title }}" />
															<span class="form-text text-muted">Please enter Meta title</span>
														</div>
														<div class="col-lg-6 offset-lg-3">
															<label>Meta Keywords:</label>
															<input id="kt_tagify_1" class="form-control tagify" name='meta_keywords' placeholder="Keywords" value="{{ old('meta_kewords') ?? $property->meta_keywords }}" />
															<span class="form-text text-muted">Please enter Meta Keywords</span>
														</div>

														<div class="col-lg-6 offset-lg-3">
															<label>Meta Description:</label>
															<textarea class="form-control" placeholder="Enter property Description" name="meta_description">{{ old('meta_description') ?? $property->meta_description }}</textarea>
															<span class="form-text text-muted">Please enter property Meta description</span>
														</div>
													</div>
													
													
													
												</div>
												<div class="card-footer">
													<div class="row">
														{{-- <div class="col-lg-5"></div> --}}
														<div class="col-lg-6 offset-lg-3">
															<button type="submit" class="btn btn-primary mr-2">Save</button>
															<button type="reset" class="btn btn-secondary">Cancel</button>
														</div>
													</div>
												</div>
												{{-- <div class="card-footer">
													<div class="row">
														<div class="col-lg-6">
															<button type="reset" class="btn btn-primary mr-2">Save</button>
															<button type="reset" class="btn btn-secondary">Cancel</button>
														</div>
														<div class="col-lg-6 text-lg-right">
															<button type="reset" class="btn btn-danger">Delete</button>
														</div>
													</div>
												</div> --}}
											</form>
											<!--end::Form-->
										</div>



@push('scripts')

<script>
    $(document).ready(function () {
    	var ckeditorid = '';
    	ckeditor(ckeditorid);
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

        });
        $('#location_id').on('change', function (e) {
            var data = $('#location_id').select2("val");
            @this.set('selectedLocation', data);
            // ckeditor(ckeditorid);

        });
        $('#category').on('change', function (e) {
            var data = $('#category').select2("val");
            @this.set('selectedCategory', data);
            // ckeditor(ckeditorid);

        });
        $('input').change( function(){
        	setTimeout( function(){
        		// ckeditor(ckeditorid);
        		$("select").each( function(s){
        			var placeholders = $(this).attr('placeholder');
        			$(this).select2("destroy").select2({ placeholder : placeholders});
        		});
        		KTTagifyDemos.init();
        	},100);

        });
        $('select').on('change', function () {
        	setTimeout( function(){
        		// ckeditor(ckeditorid);
        		$("select").each( function(s){
        			var placeholders = $(this).attr('placeholder');
        			$(this).select2("destroy").select2({ placeholder : placeholders});
        		});
        		KTTagifyDemos.init();
            	
            	
            	
            }, 1000);
        	
            	
        });

        
        
    
        
    });

</script>
<script src="{{ asset('admin-assets/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
<!--begin::Page Vendors(used by this page)-->
		{{-- <script src="{{ asset('admin-assets/assets/js/pages/crud/forms/widgets/tagify.js') }}"></script> --}}
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script>
			// ckeditor();
  //   	$("select").each( function(s){
		// 	var placeholders = $(this).attr('placeholder');
		// 	// var ids = $(this).attr('id');
		// 	// alert(ids);
		// 	$(this).select2({ placeholder : placeholders});
		// });
		// KTTagifyDemos.init();
			$('#category').select2({
			   placeholder: "Select a category"
			});
			
			
			function ckeditor(ckeditorid){
				if(ckeditorid != ''){
					ClassicEditor.remove(ckeditorid);
				}
				else{


				
				
				//CK Editor
				ClassicEditor
				.create( document.querySelector( '#description' ) )
				.then( editor => {
					ckeditorid = editor.id;
					console.log( editor.id );
				} )
				.catch( error => {
					console.error( error );
				} );

				}
			}

			




			// Class definition
var KTTagifyDemos = function() {
    // Private functions
    var demo1 = function() {
        var input = document.getElementById('kt_tagify_1'),
            // init Tagify script on the above inputs
            tagify = new Tagify(input, {
                whitelist: [],
                blacklist: [".NET", "PHP"], // <-- passed as an attribute in this demo
            })


        // "remove all tags" button event listener
        // document.getElementById('kt_tagify_1_remove').addEventListener('click', tagify.removeAllTags.bind(tagify));

        // Chainable event listeners
        tagify.on('add', onAddTag)
            .on('remove', onRemoveTag)
            .on('input', onInput)
            .on('edit', onTagEdit)
            .on('invalid', onInvalidTag)
            .on('click', onTagClick)
            .on('dropdown:show', onDropdownShow)
            .on('dropdown:hide', onDropdownHide)

        // tag added callback
        function onAddTag(e) {
            console.log("onAddTag: ", e.detail);
            console.log("original input value: ", input.value)
            tagify.off('add', onAddTag) // exmaple of removing a custom Tagify event
        }

        // tag remvoed callback
        function onRemoveTag(e) {
            console.log(e.detail);
            console.log("tagify instance value:", tagify.value)
        }

        // on character(s) added/removed (user is typing/deleting)
        function onInput(e) {
            console.log(e.detail);
            console.log("onInput: ", e.detail);
        }

        function onTagEdit(e) {
            console.log("onTagEdit: ", e.detail);
        }

        // invalid tag added callback
        function onInvalidTag(e) {
            console.log("onInvalidTag: ", e.detail);
        }

        // invalid tag added callback
        function onTagClick(e) {
            console.log(e.detail);
            console.log("onTagClick: ", e.detail);
        }

        function onDropdownShow(e) {
            console.log("onDropdownShow: ", e.detail)
        }

        function onDropdownHide(e) {
            console.log("onDropdownHide: ", e.detail)
        }
    }

    var otherstuff = function() {

    }


    


    return {
        // public functions
        init: function() {
            demo1();
            otherstuff();
            
        }
    };
}();

jQuery(document).ready(function() {
    KTTagifyDemos.init();
});
		</script>

@endpush
													
