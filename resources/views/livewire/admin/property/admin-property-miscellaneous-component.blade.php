<div class="card card-custom gutter-b example example-compact"  wire:ignore>
											<div class="card-header">
												<h3 class="card-title">Miscellaneous - Property</h3>
												<div class="card-toolbar">
													<span>
														<!-- Button trigger modal-->
														{{-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addroom">
														    Add Room
														</button> --}}
													</span>
												</div>
											</div>
											
											<!--begin::Form-->
											<form class="form" >
												<div class="card-body">
													<div class="row">
														<div class="col-lg-8 offset-lg-2">
															
															
															
															
															@error('feature.*')
															    <div class="alert alert-danger">{{ $message }}</div>
															@enderror
														</div>
													</div>
													
													<div class="row">
														<div class="col-lg-12">
															
															    <div class="form-group row">
															        <div class="col-lg-6">
																		<label>Check in Time:</label>
																		<input type="time" class="form-control" placeholder="Enter property name" wire:model="check_in"  />
																		<span class="form-text text-muted">Please enter Meta title</span>
																	</div>
																	<div class="col-lg-6">
																		<label>Check Out Time:</label>
																		<input type="time" class="form-control" placeholder="Enter property name" wire:model="check_out"  />
																		<span class="form-text text-muted">Please enter Meta title</span>
																	</div>
																	<div class="col-lg-4">
																		<label>Breakfast price(per person):</label>
																		<input type="text" class="form-control" placeholder="Enter property name" wire:model="breakfast_cost"  />
																		<span class="form-text text-muted">Please enter Meta title</span>
																	</div>
																	<div class="col-lg-4">
																		<label>Lunch Price(per person):</label>
																		<input type="text" class="form-control" placeholder="Enter property name" wire:model="lunch_cost"  />
																		<span class="form-text text-muted">Please enter Meta title</span>
																	</div>
																	<div class="col-lg-4">
																		<label>Dinner Price(per person):</label>
																		<input type="text" class="form-control" placeholder="Enter property name" wire:model="dinner_cost" />
																		<span class="form-text text-muted">Please enter Meta title</span>
																		@error('dinner_cost') {{$message}} @enderror
																	</div>
																	<div class="col-lg-12">
																		<label>Cancellation Policy:</label>
																		<textarea class="form-control" placeholder="Enter property name" id="cancellationpolicy" name="cancellationpolicy" wire:model="cancellationpolicy">{{$cancellationpolicy}}</textarea>
																		<span class="form-text text-muted">Please enter Meta title</span>
																	</div>
																	
															    </div>
															    
															
														</div>
													</div>
												</div>
												
												<div class="card-footer">
													<div class="row">
														
														<div class="col-lg-12 text-lg-right">
															<button type="submit" wire:click.prevent="saveMiscellaneous" class="btn btn-dark" >Save</button>
														</div>
													</div>
												</div>
											</form>
											<!--end::Form-->
											@push('scripts')
<script>
			//CK Editor
				// ClassicEditor
				// .create( document.querySelector( '#cancellationpolicy' ) )
				// .then( editor => {
				// 	// ckeditorid = editor.id;
				// 	// console.log( editor.id );
				// } )
				// .catch( error => {
				// 	console.error( error );
				// } );
		</script>
@endpush
										</div>
										<!--end::Card-->


