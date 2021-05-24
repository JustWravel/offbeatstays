<div class="card card-custom gutter-b example example-compact">
											<div class="card-header">
												<h3 class="card-title">Features - Property</h3>
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
											<form class="form" wire:submit.prevent="saveFeature">
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
															        <label class="col-12 col-form-label">Features Availble</label>
															        <div class="col-12 col-form-label">
															            <div class="checkbox-inline">
															            	@foreach($features as $feature)
															                <label class="checkbox checkbox-outline checkbox-success">
															                    <input type="checkbox" name="Checkboxes15" value="{{ $feature->id }}" wire:model="feature.{{ $feature->id }}" />
															                    <span></span>
															                     &nbsp; {{$feature->name}}
															                </label>
															                @endforeach
															                
															            </div>
															            <span class="form-text text-muted">Some help text goes here</span>
															        </div>
															    </div>
															    
															
														</div>
													</div>
												</div>
												
												<div class="card-footer">
													<div class="row">
														
														<div class="col-lg-12 text-lg-right">
															<button type="submit" class="btn btn-dark" >Save</button>
														</div>
													</div>
												</div>
											</form>
											<!--end::Form-->
										</div>
										<!--end::Card-->

