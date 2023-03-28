@extends('layouts.admin')

@section('main-content')
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800">Edit Lelang</h1>

		<!-- Main Content goes here -->

		<div class="card">
				<div class="card-body">
						<form action="{{ route('lelang.update', $lelang->id) }}" method="post" enctype="multipart/form-data">
								@csrf
								@method('put')

								<div class="form-group">
										<label for="status">Status</label>
										<select class="form-select form-control @error('status') is-invalid @enderror" name="status" id="status"
												placeholder="status" autocomplete="off">
												<option value="dibuka">dibuka</option>
												<option value="ditutup">ditutup</option>
										</select>
										@error('status')
												<span class="text-danger">{{ $message }}</span>
										@enderror
								</div>
					


		<button type="submit" class="btn btn-primary">Save</button>
		<a href="{{ route('barangs.index') }}" class="btn btn-default">Kembali</a>

		</form>
		</div>
		</div>

		<!-- End of Main Content -->
@endsection

@push('notif')
		@if (session('success'))
				<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
						{{ session('success') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
						</button>
				</div>
		@endif

		@if (session('warning'))
				<div class="alert alert-warning border-left-warning alert-dismissible fade show" role="alert">
						{{ session('warning') }}
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
@endpush
