@extends('layouts.admin')

@section('main-content')
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Blank Page') }}</h1>

		<!-- Main Content goes here -->

		<div class="card">
				<div class="card-body">
						<form action="{{ route('lelang.store') }}" method="post" enctype="multipart/form-data">
								@csrf

								<div class="form-group">
										<label for="nama_barang">Nama</label>
										<select class="form-select form-control @error('id_barang') is-invalid @enderror" name="id_barang" id="id_barang"
												placeholder="Nama Barang" autocomplete="off" value="{{ old('id_barang') }}">
												<option selected name="id_barang">Pilih barang</option>
												@foreach ($barang as $brg)
														<option value="{{ $brg->id }}">{{ $brg->nama_barang }}</option>
												@endforeach
										</select>
										@error('nama_barang')
												<span class="text-danger">{{ $message }}</span>
										@enderror
								</div>





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

								<div class="form-group">
										<label for="tanggal_lelang">Tanggal</label>
										<input type="datetime-local" class="form-control @error('tanggal_lelang') is-invalid @enderror"
												name="tanggal_lelang" id="tanggal_lelang" placeholder="Tanggal" autocomplete="off">
										@error('tanggal_lelang')
												<span class="text-danger">{{ $message }}</span>
										@enderror
								</div>






								<button type="submit" class="btn btn-primary">Save</button>
								<a href="{{ route('lelang.index') }}" class="btn btn-default">Kembali</a>

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
