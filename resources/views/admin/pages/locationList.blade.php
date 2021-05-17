@extends('admin.app')

@section('content')
    <!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

						<!--[html-partial:include:{"file":"partials/_subheader/subheader-v1.html"}]/-->
						<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">

									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline flex-wrap mr-5">

										<!--begin::Page Title-->
										<h5 class="text-dark font-weight-bold my-1 mr-5">All Locations</h5>

										<!--end::Page Title-->
									</div>

									<!--end::Page Heading-->
								</div>

								<!--end::Info-->

								<!--begin::Toolbar-->
								<div class="d-flex align-items-center">

									<!--begin::Actions-->
									<a href="{{ route('admin.location.create') }}" class="btn btn-light-primary font-weight-bolder btn-sm">Add New</a>

									<!--end::Actions-->

								</div>

								<!--end::Toolbar-->
							</div>
						</div>
						<!--Content area here-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								
								<!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header flex-wrap py-5">
										<div class="card-title">
											<h3 class="card-label">View All Locations
											</h3>
										</div>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-lg-8 offset-lg-2">
												@if (session('success'))
													<div class="alert alert-success">
         												{{ session('success') }}
         											</div>
         										@endif
											</div>	
										</div>					
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
											<thead>
												<tr>
													<th>Record ID</th>
													<th>Location</th>
													<th>State</th>
													<th>Image</th>
													<th>Description</th>
													
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
												@foreach($locations as $location)
												<tr>
													<td>{{ $location->id }}</td>
													<td><a class="text-dark-50 text-hover-primary" href="{{ $location->slug }}">{{ $location->name }}</a></td>
													<td>{{ $location->state->name }}</td>
													<td><img src="{{ $location->image }}" style="width: 40px" alt=""></td>
													<td>{{ $location->description }}</td>
													
													<td nowrap="nowrap">
														<a href="{{ route('admin.location.edit', ['location' => $location->id]) }}" class="btn btn-sm btn-primary btn-icon" title="Edit details">
															<i class="la la-edit"></i>
														</a>
														<form method="POST" action="{{ route('admin.location.show', ['location' => $location->id]) }}" onsubmit=" return confirm('Are you sure ?? Delete this loction!')" style="display: inline;">
														    @csrf
														    @method('DELETE')
														    <button type="submit" class="btn btn-sm btn-danger btn-icon" title="Delete"><i class="la la-trash"></i></button>
														</form>
														{{-- <a href="{{ route('admin.state.show', ['state' => $state->id]) }}" class="btn btn-sm btn-danger btn-icon" title="Delete">
															<i class="la la-trash"></i>
														</a> --}}
													</td>
												</tr>
												@endforeach
												
												
											</tbody>
										</table>
										<!--end: Datatable-->
									</div>
								</div>
								<!--end::Card-->
								
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
@endsection

@section('pageWiseJavaScript')
<!--begin::Page Vendors(used by this page)-->
		<script src="{{ asset('admin-assets/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script>
			"use strict";
var KTDatatablesAdvancedColumnRendering = function() {

	var init = function() {
		var table = $('#kt_datatable');

		// begin first table
		table.DataTable({
			responsive: true,
			paging: true,
			columnDefs: [
				/*{
					targets: 0,
					title: 'Agent',
					render: function(data, type, full, meta) {
						var number = KTUtil.getRandomInt(1, 14);
						var user_img = '100_' + number + '.jpg';

						var output;
						if (number > 8) {
							output = `
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50 flex-shrink-0">
                                        <img src="assets/media/users/` + user_img + `" alt="photo">
                                    </div>
                                    <div class="ml-3">
                                        <span class="text-dark-75 font-weight-bold line-height-sm d-block pb-2">` + full[2] + `</span>
                                        <a href="#" class="text-muted text-hover-primary">` + full[3] + `</a>
                                    </div>
                                </div>`;
						}

						else {
							var stateNo = KTUtil.getRandomInt(0, 7);
							var states = [
								'success',
								'light',
								'danger',
								'success',
								'warning',
								'dark',
								'primary',
								'info'];

							var state = states[stateNo];

							output = `
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50 symbol-light-` + state + `" flex-shrink-0">
                                        <div class="symbol-label font-size-h5">` + full[2].substring(0, 1) + `</div>
                                    </div>
                                    <div class="ml-3">
                                        <span class="text-dark-75 font-weight-bold line-height-sm d-block pb-2">` + full[2] + `</span>
                                        <a href="#" class="text-muted text-hover-primary">` + full[3] + `</a>
                                    </div>
                                </div>`;
						}

						return output;
					},
				},*/
				// {
				// 	targets: 1,
				// 	render: function(data, type, full, meta) {
				// 		return '<a class="text-dark-50 text-hover-primary" href="##' + data + '">' + data + '</a>';
				// 	},
				// },
				// {
				// 	targets: -1,
				// 	title: 'Actions',
				// 	orderable: false,
				// 	render: function(data, type, full, meta) {
				// 		return '\
				// 			<a href="'+ data +'" class="btn btn-sm btn-primary btn-icon" title="Edit details">\
				// 				<i class="la la-edit"></i>\
				// 			</a>\
				// 			<a href="'+ data +'" class="btn btn-sm btn-danger btn-icon" title="Delete">\
				// 				<i class="la la-trash"></i>\
				// 			</a>\
				// 		';
				// 	},
				// },
				// {
				// 	targets: 4,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Pending', 'class': 'label-light-primary'},
				// 			2: {'title': 'Delivered', 'class': ' label-light-danger'},
				// 			3: {'title': 'Canceled', 'class': ' label-light-primary'},
				// 			4: {'title': 'Success', 'class': ' label-light-success'},
				// 			5: {'title': 'Info', 'class': ' label-light-info'},
				// 			6: {'title': 'Danger', 'class': ' label-light-danger'},
				// 			7: {'title': 'Warning', 'class': ' label-light-warning'},
				// 		};
				// 		if (typeof status[data] === 'undefined') {
				// 			return data;
				// 		}
				// 		return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
				// 	},
				// },
				// {
				// 	targets: 5,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Online', 'state': 'danger'},
				// 			2: {'title': 'Retail', 'state': 'primary'},
				// 			3: {'title': 'Direct', 'state': 'success'},
				// 		};
				// 		if (typeof status[data] === 'undefined') {
				// 			return data;
				// 		}
				// 		return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
				// 			'<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
				// 	},
				// },
			],
		});

		// $('#kt_datatable_search_status').on('change', function() {
		// 	datatable.search($(this).val().toLowerCase(), 'Status');
		// });

		// $('#kt_datatable_search_type').on('change', function() {
		// 	datatable.search($(this).val().toLowerCase(), 'Type');
		// });

		// $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
	};

	return {

		//main function to initiate the module
		init: function() {
			init();
		}
	};
}();

jQuery(document).ready(function() {
	KTDatatablesAdvancedColumnRendering.init();
});
		</script>
		<!--end::Page Scripts-->
@endsection
					
					
					
		