@extends('admin.app')

@section('pagename')

@endsection
@section('content')
    <!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

						<!--[html-partial:include:{"file":"partials/_subheader/subheader-v1.html"}]/-->
						
<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">

									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline flex-wrap mr-5">

										<!--begin::Page Title-->
										<h5 class="text-dark font-weight-bold my-1 mr-5">Edit Property</h5>

										<!--end::Page Title-->
									</div>

									<!--end::Page Heading-->
								</div>

								<!--end::Info-->

								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">

									<!--begin::Actions-->
									<a href="{{ route('admin.property.index') }}" class="btn btn-light-primary font-weight-bolder btn-sm">View All</a>

									<!--end::Actions-->

								</div>

								<!--end::Toolbar-->
							</div>
						</div>

						<!--end::Subheader-->
						
						<!--Content area here-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<div class="row">
									<div class="col-lg-8 offset-lg-2">
										@if (session('success'))
											<div class="alert alert-success">
 												{{ session('success') }}
 											</div>
 										@endif
									</div>	
								</div>
								<div class="row">
									<div class="col-lg-12">
										<!--begin::Card-->
										@livewire('admin.property.admin-property-basic-info-component', ['property_id' => $property->id])
										<!--end::Card-->
										<!--begin::Card-->
										@livewire('admin.property.admin-property-image-upload-component', ['property_id' => $property->id])
										{{-- @livewire('admin.property.admin-property-upload-component',['selectedLocation'=>old('location_id') ?? $property->location_id]) --}}
										<!--begin::Card-->
										@livewire('admin.property.admin-property-rooms-component', ['property_id' => $property->id])
										<!--end::Card-->
										<!--begin::Card-->
										@livewire('admin.property.admin-property-amenities-component', ['property_id' => $property->id])
										<!--end::Card-->
										<!--begin::Card-->
										@livewire('admin.property.admin-property-features-component', ['property_id' => $property->id])
										<!--end::Card-->			
										
										
									</div>
								</div>
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
@endsection

@section('pageWiseJavaScript')

@endsection
					
					
					
		