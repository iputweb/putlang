@extends('layouts.admin')

@section('main-content')
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800">Edit Barang Lelang</h1>

		<!-- Main Content goes here -->

		<div class="card">
				<div class="card-body">
						<form action="{{ route('barangs.update', $barang->id) }}" method="post" enctype="multipart/form-data">
								@csrf
								@method('put')

								<div class="form-group">
										<label for="nama_barang">Nama</label>
										<input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang"
												id="nama_barang" placeholder="Nama Barang" autocomplete="off"
												value="{{ old('nama_barang') ?? $barang->nama_barang }}">
										@error('nama_barang')
												<span class="text-danger">{{ $message }}</span>
										@enderror
								</div>

								<div class="form-group">
										<label for="harga_barang">Harga Awal</label>
										<input type="text" class="form-control @error('harga_barang') is-invalid @enderror" name="harga_barang"
												id="harga_barang" placeholder="Harga Awal" autocomplete="off"
												value="{{ old('harga_barang') ?? $barang->harga_barang }}">
										@error('harga_barang')
												<span class="text-danger">{{ $message }}</span>
										@enderror
								</div>

								<div class="form-group">
										<label for="tanggal_barang">Tanggal</label>
										<input type="date" class="form-control @error('tanggal_barang') is-invalid @enderror" name="tanggal_barang"
												id="tanggal_barang" placeholder="Tanggal" autocomplete="off"
												value="{{ old('tanggal_barang') ?? $barang->tanggal_barang }}">
										@error('tanggal_barang')
												<span class="text-danger">{{ $message }}</span>
										@enderror
								</div>

								<label for="deskripsi_barang">Deskripsi</label>
								<input type="text" class="form-control @error('deskripsi_barang') is-invalid @enderror" name="deskripsi_barang"
										id="deskripsi_barang" placeholder="Deskripsi" autocomplete="off"
										value="{{ old('deskripsi_barang') ?? $barang->deskripsi_barang }}">
								@error('deskripsi_barang')
										<span class="text-danger">{{ $message }}</span>
								@enderror
				</div>

				<div class="form-group">
						<label for="gambar_barang">Gambar</label>
						<input type="file" class="form-control @error('gambar_barang') is-invalid @enderror" name="gambar_barang"
								id="gambar_barang" placeholder="Gambar" accept="image/*"
								onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" autocomplete="off"
								value="{{ old('gambar_barang') ?? $barang->gambar_barang }}">
						@error('gambar_barang')
								<span class="text-danger">{{ $message }}</span>
						@enderror
				</div>
				<div class="mt-3 mb-3"><img src="" id="output" width="500" alt=""></div>

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
