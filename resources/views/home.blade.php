@extends('layouts.admin')

@section('main-content')
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

		@if (session('success'))
				<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
						{{ session('success') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
						</button>
				</div>
		@endif

		@if (session('status'))
				<div class="alert alert-success border-left-success" role="alert">
						{{ session('status') }}
				</div>
		@endif

		<div class="row">

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-primary h-100 py-2 shadow">
								<div class="card-body">
										<div class="row no-gutters align-items-center">
												<div class="col mr-2">
														<div class="font-weight-bold text-primary text-uppercase mb-1 text-xs">Petugas</div>
														<div class="h5 font-weight-bold mb-0 text-gray-800">{{ $widget['admins'] }}</div>
												</div>
												<div class="col-auto">
														<i class="fas fa-user fa-2x text-gray-300"></i>
												</div>
										</div>
								</div>
						</div>
				</div>

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-success h-100 py-2 shadow">
								<div class="card-body">
										<div class="row no-gutters align-items-center">
												<div class="col mr-2">
														<div class="font-weight-bold text-success text-uppercase mb-1 text-xs">Barang lelang</div>
														<div class="h5 font-weight-bold mb-0 text-gray-800">{{ $widget['barangs'] }}</div>
												</div>
												<div class="col-auto">
														<i class="fas fa-box fa-2x text-gray-300"></i>
												</div>
										</div>
								</div>
						</div>
				</div>

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-warning h-100 py-2 shadow">
								<div class="card-body">
										<div class="row no-gutters align-items-center">
												<div class="col mr-2">
														<div class="font-weight-bold text-success text-uppercase mb-1 text-xs">Pelelang</div>
														<div class="h5 font-weight-bold mb-0 text-gray-800">{{ $widget['masyarakats'] }}</div>
												</div>
												<div class="col-auto">
														<i class="fas fa-flag-checkered fa-2x text-gray-300"></i>
												</div>
										</div>
								</div>
						</div>
				</div>
				<!-- Users -->

		</div>

		<div class="row">

				<!-- Content Column -->

		</div>
@endsection
