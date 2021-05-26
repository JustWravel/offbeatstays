<div class="card card-custom gutter-b example example-compact">
											<div class="card-header">
												<h3 class="card-title">Rooms & Pricing - Property</h3>
												<div class="card-toolbar">
													<span>
														<!-- Button trigger modal-->
														<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addroom">
														    Add Room
														</button>
													</span>
												</div>
											</div>
											@include('livewire.admin.property.admin-property-rooms-create')
											@include('livewire.admin.property.admin-property-rooms-edit')

											<!--begin::Form-->
											
												<div class="card-body">
													<div class="row">
														<div class="col-lg-8 offset-lg-2">
															
															
															
															
															@error('photos.*')
															    <div class="alert alert-danger">{{ $message }}</div>
															@enderror
														</div>
													</div>
													
													<div class="row">
														@forelse($property->rooms as $room)
														<div class="col-lg-6">
															
															<div class="card card-custom bg-light gutter-b">
																 <div class="card-header">
																  <div class="card-title">
																    <h3 class="card-label">
																    {{$room->name}}
																    {{-- <small>sub title</small> --}}
																   </h3>
																  </div>
															        <div class="card-toolbar">
															            <a href="javascript::void(0);" class="btn btn-sm btn-info " data-toggle="modal" data-target="#editroom" wire:click=editRoom({{$room->id}})>
															                <i class="flaticon2-pen"></i>
															            </a>
															            <a href="javascript::void(0);" class="btn btn-sm btn-danger "  wire:click.prevent=deleteRoom({{$room->id}})>
															                <i class="flaticon2-trash"></i>
															            </a>
															        </div>
																 </div>
																 <div class="card-body">
																 	Images: 
																 	@forelse((array)json_decode($room->image) as $image)
																 	<img src="{{$image}}" style="height:50px" alt="" class="img-thumbnail">
																 	@empty
																 	<img src="{{$room}}" style="height:50px" alt="" class="img-thumbnail">
																 	@endforelse
																 	<br>
																  <p>Description: {{$room->description}}</p>
																  <div class="table-responsive">
																  	<table class="table table-bordered table-inverse table-hover">
																  		<thead>
																  			<tr>
																  			<th>Basis</th>
																  			<th>Nightly</th>
																  			<th>Weekend</th>
																  			<th>Weekly</th>
																  			<th>Fortnightly</th>
																  			<th>Monthly</th>
																  		</tr>
																  		</thead>
																  		<tbody>
																  			<tr>
																  			<th>Cost</th>
																  			<td>{{$room->cost_per_night}}</td>
																  			<td>{{$room->cost_per_night_weekend}}</td>
																  			<td>{{$room->cost_per_night_weekly}}</td>
																  			<td>{{$room->cost_per_night_fortnightly}}</td>
																  			<td>{{$room->cost_per_night_monthly}}</td>
																  		</tr>
																  		</tbody>
																  	</table>
																  </div>
																 </div>
																    {{-- <div class="card-footer d-flex justify-content-between">
																        <a href="#" class="btn btn-light-primary font-weight-bold">Manage</a>
																        <a href="#" class="btn btn-outline-secondary font-weight-bold">Learn more</a>
																 </div> --}}
																</div>
															
															

														</div>
														@empty
														<div class="col-lg-8 offset-lg-2">
															<p>{{ 'No Rooms are there in this property' }}</p>
														</div>
														@endforelse
														

														
													</div>
													
													
													
													
													
													
												</div>
												
												<div class="card-footer">
													<div class="row">
														
														<div class="col-lg-12 text-lg-right">
															<button type="submit" class="btn btn-dark">Save</button>
														</div>
													</div>
												</div>
											
											<!--end::Form-->
										</div>
										<!--end::Card-->
										
@push('scriptsAfterLivewire')
<script>
			window.livewire.on('roomUpdated',()=>{
				$('#editroom').modal('hide');
			});
			window.livewire.on('roomAdded',()=>{
				$('#addroom').modal('hide');
			});
		</script>
@endpush
